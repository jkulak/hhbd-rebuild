<?php
# ****************************************
# autor: Jakub 'feedel' Ku�ak
# data utworzenia: 22.10.2004
# projekt: www.4fun.pl, www.forfun.pl
# email: jakubkulak at interia dot pl
# @version $Id$
#                                        
# plik dodajacy plyte do chcekolekcji        
# ****************************************

if (!isset($_SESSION['hhbdlogin'])) {
	header ( 'Location: /');
	}
else {
	$sql = 'SELECT id FROM albums WHERE urlname="' . $id . '"';
	$row = @mysql_fetch_array(@mysql_query($sql));
	$rid = $row['id'];
	
	$sql = 'DELETE FROM wishlist WHERE (userid=' . $_SESSION['hhbduserid'] . ' AND albumid=' . $rid . ')';
	$result = @mysql_query($sql);
	header('Location: /a/' . $id);
	}
	






?>