CREATE TABLE IF NOT EXISTS articles(
articles_id smallint( 5 ) unsigned NOT NULL AUTO_INCREMENT ,
articles_nom varchar( 50 ) NOT NULL ,
articles_ref varchar( 20 ) NOT NULL ,
articles_stock smallint( 6 ) NOT NULL ,
articles_min smallint( 6 ) NOT NULL ,
articles_prix float unsigned NOT NULL ,
PRIMARY KEY ( articles_id )
) ENGINE = InnoDB DEFAULT CHARSET = utf8 AUTO_INCREMENT =1