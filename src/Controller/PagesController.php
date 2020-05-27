<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Umail;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event); // Libera Home

        $this->Auth->allow('display');
    }

    public function display(...$path)
    {
        $dbLivros = new LivrosController();
		$dbCat = new LivrocatController();
		$dbSubtitle = new SubtitulositeController();
		$dbUsers = new UsuariosController();
		$dbMural = new MuralController();
        $dbPontos = new PontosController();
        $dbTitulos = new TitulosController();
        $dbMails = new UmailController();

        // Categorias - barra lateral
		$qcategoria = $dbCat->Livrocat->find()->orderAsc('categoria');

		// Vitrine de livros :: Principal (Ultimos 5)
		$qlivros = $dbLivros->Livros->find('all', [
            'order' => ['id' => 'DESC'],
            'limit' => 5
        ]);

        // Vitrine de livros :: Indie
        $qlivrosIndie = $dbLivros->Livros->find('all', [
            'contain' => ['Livroautor', 'Livroeditoras'],
            'order' => 'rand()',
            'limit' => 15
            ])->where([
                'Livroautor.indie' => 1,
                'Livroeditoras.id' => 0
        ]);

        // Vitrine de livros :: Mais lidos
        $qlivrosMaisLidos = $dbLivros->Livros->find('all', [
            'contain' => ['Livropontos'],
            'order' => ['SUM(Livropontos.pontos)' => 'DESC'], // <- Soma pontos para + Lidos
            'limit' => 15
        ]);

		// Mural
        $qMural = $dbMural->Mural->find('all', ['contain' => [
				'Usuarios', 'Muraltipos'
			],
			[
				'order' => ['id' => 'DESC'], 
				'limit' => 5
			]
		]);

        // Detectar mail
     /*   $qMail = $dbMails->Umail->find('all')
            ->where(
                [
                    'Umail.para' => $this->request->getSession()->read('Auth.User.id'),
                    'Umail.ativo' => 1,
                    'Umail.data_lido' => '!null'
                ]
            );
        $countMail = $qMail->count(); */

        // Pontos
        $qpontos = $dbPontos->Pontos->find()->orderAsc('id')->first();
        $qtitulos = $dbTitulos->Titulos->find('all');

        $this->set(compact('qcategoria', 'qlivros', 'qlivrosIndie',
                    'qlivrosMaisLidos', 'qMural', 'qpontos', 'qtitulos'));
		
		// ----------------------------------------
		// Display page
		// ----------------------------------------
		$count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }

		
    }

}
