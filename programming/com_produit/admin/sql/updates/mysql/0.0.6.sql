DROP TABLE IF EXISTS `#__produit`;
 
CREATE TABLE `#__produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `type_produit` varchar(90) NOT NULL,
  `mediaid` int(10) NOT NULL,
  `intitule` varchar(90) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp ON UPDATE CURRENT_TIMESTAMP,
  `catid` int(11) NOT NULL DEFAULT '0',
  `description` TEXT NOT NULL DEFAULT '',
  `lvl` tinyint(1),
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `#__produit_media` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `image_url` varchar(255) NOT NULL,
   `pdf_url` varchar(255) NOT NULL,
   `slug` varchar(255) NOT NULL,
   `modified` date DEFAULT '0000/00/00 00:00:00',
   `modified_by` int(11) NOT NULL,
   `created` date DEFAULT '0000/00/00 00:00:00',
   `created_by` int(11) NOT NULL,
   `publish_up` date DEFAULT '0000/00/00 00:00:00', 
   `publish_down` date DEFAULT '0000/00/00 00:00:00',
	PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
INSERT INTO `#__produit_media` (`id`,`image_url`,`pdf_url`,`slug`,`created`) VALUES
        (1,'images/produits/Filtration/3309621-4746523.jpg','pdf/produits/fiche_produit_filtre150_261011_1.pdf','Filtre FP3',CURDATE()),
		(2,'images/produits/Filtration/filtre140.jpg','pdf/produits/fiche_produit_filtre140_261011_1_.pdf', 'Filtre 140', CURDATE()),
                (3,'images/produits/Adoucissement/1550.jpg','pdf/produits/fiche_pdt_serie_3000.pdf','Adoucisseur', CURDATE());

INSERT INTO `#__produit` (`title`,`type_produit`,`mediaid`, `intitule`, `created`, `catid`,`description`) VALUES
        ('Filtre 150','Filtration',1,'Filtre fin à rinçage à contre-courant','2013-18-13 13:19:59',13,'<table id="product">
	<tbody><tr>
		<td colspan="4" class="title">Filtre 120</td>
	</tr>
	<tr>
		<th>Codes</th>
		<td>&nbsp;</td>
		<td>0150 0001</td>
		<td>0150 0002</td>
	</tr>
	<tr>
		<th>Raccords (R)</th>
		<td>&nbsp;</td>
		<td>1 1/2"</td>
		<td>2"</td>
	</tr>
	<tr>
		<th>Diamètre (DN)</th>
		<td>&nbsp;</td>
		<td>40</td>
		<td>50</td>
	</tr>
	<tr>
		<th>Poids approxi. (Kg)</th>
		<td>&nbsp;</td>
		<td>4,0</td>
		<td>4,8</td>
	</tr>
	
	
	
	
	<tr>
		<th>Débit à DP = 0,2 BAR</th>
		<td>&nbsp;</td>
		<td>15,6</td>
		<td>16,5</td>
	</tr>
	
	<tr>
		<th>KVS</th>
		<td>&nbsp;</td>
		<td>21,0</td>
		<td>22,0</td>
	</tr>
	
	<tr>
		<th>DIN/DVGW - N° de registre</th>
		<td>&nbsp;</td>
		<td>NW - 9301 AT 2308</td>
		<td>NW - 9301 AT 2308</td>
	</tr>
	<tr>
		<th>Technologie doube spin</th>
		<td>&nbsp;</td>
		<td>Non</td>
		<td>Non</td>
	</tr>
	<tr>
		<th rowspan="9">Dimensions</th>
		<td>mm</td>
	</tr>
	<tr>
		<td>H</td>
		<td>353</td>
		<td>353</td>
		
	</tr>
	<tr>
		<td>h</td>
		<td>298</td>
		<td>298</td>
	</tr>
	<tr>
		<td>L</td>
		<td>179</td>
		<td>197</td>
	</tr>
	<tr>
		<td>l</td>
		<td>100</td>
		<td>105</td>
	</tr>
	<tr>
		<td>B</td>
		<td>178</td>
		<td>182</td>
	</tr>
	<tr>
		<td>b</td>
		<td>150</td>
		<td>150</td>
	</tr>
	<tr>
		<td>t</td>
		<td>92</td>
		<td>96</td>
	</tr>
	<tr>
		<td>ØT</td>
		<td>50</td>
		<td>50</td>
	</tr>
		
	
</tbody></table>',0),
        ('Filtre 140','Filtration',2,'Filtre fin à rinçage à contre-courant','2013-18-13 13:29:49',13,'<table id="product">
	<tbody><tr>
		<td colspan="4" class="title">Filtre 140</td>
	</tr>
	<tr>
		<th>Codes</th>
		<td>&nbsp;</td>
		<td>0140 0001</td>
		<td>0140 0002</td>
	</tr>
	<tr>
		<th>Raccords (R)</th>
		<td>&nbsp;</td>
		<td>1"</td>
		<td>1" 1/4</td>
	</tr>
	<tr>
		<th>Poids approxi. (Kg)</th>
		<td>&nbsp;</td>
		<td>2,3</td>
		<td>2,6</td>
	</tr>
	
	<tr>
		<th rowspan="9">Dimensions</th>
		<td>mm</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
	</tr>
	<tr>
		<td>H</td>
		<td>353</td>
		<td>353</td>
		
	</tr>
	<tr>
		<td>h</td>
		<td>298</td>
		<td>298</td>
	</tr>
	<tr>
		<td>L</td>
		<td>179</td>
		<td>197</td>
	</tr>
	<tr>
		<td>l</td>
		<td>100</td>
		<td>105</td>
	</tr>
	<tr>
		<td>B</td>
		<td>178</td>
		<td>182</td>
	</tr>
	<tr>
		<td>b</td>
		<td>150</td>
		<td>150</td>
	</tr>
	<tr>
		<td>t</td>
		<td>92</td>
		<td>96</td>
	</tr>
	<tr>
		<td>ØT</td>
		<td>50</td>
		<td>50</td>
	</tr>
	
	<tr>
		<th>KVS</th>
		<td>&nbsp;</td>
		<td>8,5</td>
		<td>9,0</td>
	</tr>
</tbody></table>',0);
