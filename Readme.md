# Product Pack

Ce module Thelia 2 permet d'associer des produits existants dans un produit "hôte", pour former un pack.

Pour l'utiliser, créez un nouveau produit, puis allez dans l'onglet "Lot". Vous pouvez alors ajouter des produits pour constituer un pack.
Vous pouvez indiquer une quantité pour chaque produit, ainsi qu'un prix unitaire.

Pour afficher les produits constituant le pack, utilisez la boucle `productpack.items`, qui peut prendre 2 paramètres :

- `host_product_id` : l'indeitifant du produit hote (celui qui contient les produits) 
- `product_id` : l'ID d'un des produits intégré au pack

La boucle remontera les informations suivantes 

- ID : identifant de la relation produit hôte / produit du pack
- HOST_PRODUCT_ID : identifiant du produit hôte
- PRODUCT_ID : identifiant du produit du pack
- QUANTITY : quantité du produit dans le pack
- PRICE : produit du produit dans le pack
- POSITION : position du produit dans le pack

Pour l'instant, ce module ne gère pas les stocks des produits constituant le pack.
