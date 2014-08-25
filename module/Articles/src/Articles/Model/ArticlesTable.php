<?php

namespace Articles\Model;

use Zend\Db\TableGateway\TableGateway;

class ArticlesTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    /**
     * Obtention de tout le contenu de la table
     * @return Object ResultSet
     */
    public function fetchAll() {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    /**
     * Obtention d'un enregistrement
     * 
     * @param Integer $id
     * @return Object ResultSet
     * @throws \Exception
     */
    public function getArticles($id) {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(array('articles_id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Enregistrement introuvable pour id : $id");
        }
        return $row;
    }

    /**
     * Enregistrement ou mise à jour d'un enregistrement
     * 
     * @param \Articles\Model\Articles $article
     * @throws \Exception
     */
    public function saveArticles(Articles $article) {
        $data = array(
            'articles_nom' => $article->articles_nom,
            'articles_ref' => $article->articles_ref,
            'articles_stock' => $article->articles_stock,
            'articles_min' => $article->articles_min,
            'articles_prix' => $article->articles_prix,
        );

        $id = (int) $article->articles_id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getArticles($id)) {
                $this->tableGateway->update($data, array('articles_id' => $id));
            } else {
                throw new \Exception('id non trouvé');
            }
        }
    }

    /**
     * Suppression d'un enrgistrement
     * 
     * @param Integer $id
     */
    public function deleteArticles($id) {
        $this->tableGateway->delete(array('articles_id' => $id));
    }

}
