# Product Pack

Ce module permet d'associer des produits existants, pour former un pack.

Pour l'utiliser, créez un nouveau produit, puis allez dans l'onglet "Lot". Vous pouvez alors aouter des produits.
Vous pouvez indiquer un 

Pour afficher dans votre template les produits constituant le pack, utilisez la boucle productpack.items, qui pet prendre 2 paramètres :

- host_product_id : l'indeitifant du produit qui 
- product_id : l'ID d'u des produits intégré au pack

Pour l'instant, ce module ne gère pas les stocks des produits constituant le pack.
