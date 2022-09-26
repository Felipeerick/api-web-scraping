<?php

namespace App\Http\Controllers;
use Weidner\Goutte\GoutteFacade;

class ApiScraperController extends Controller
{
    private $data = array();
    private $response;

    public function scraper()
    {
        $this->response = GoutteFacade::request('GET', 'https://blog.prozeducacao.com.br/profissao/lista-de-todas-as-profissoes-que-existem/');

        $this->response->filter('div .content-blog h3')->each(function ($item)
        {
          $this->data[$item->text()] = $this->response->filter('div .content-blog li')->each(function ($node)
          {
            return explode('Profissão',$node->text())[0];
          });  
        });

        return $this->data;
    }
}
