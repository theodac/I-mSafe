# I'm Safe

## INSTALLATION DE L'APPLICATION

 Faire un git clone du projet : 
*git clone https://github.com/theodac/I-mSafe.git*

## INSTALLATION DES DEPENDANCES
A la racine du projet, avec le terminal effectué un composer install :
*Composer install*

## LANCEMENT DE L'APPLICATION
Vous pouvez maintenant profiter de la web application.

##  
### Data sources
#### Diffusion vigilances météorologiques

```
https://www.data.gouv.fr/fr/datasets/r/6315e3ce-c18c-4de0-b399-531e5d99315c
```
https://www.data.gouv.fr/fr/datasets/diffusion-temps-reel-de-la-vigilance-meteorologique-en-metropole/

---

#### Diffusion qualité de l'air
```
https://www.data.gouv.fr/fr/datasets/r/6d20ddc1-b63b-4a55-81b7-cab3cb4ee956
```
https://www.data.gouv.fr/fr/datasets/mise-a-disposition-de-donnees-de-qualite-de-lair-sur-la-france-www-prevair-org-1/

---

#### Liste des commissariats
```
GET https://www.data.gouv.fr/fr/datasets/r/2cb2f356-42b2-4195-a35c-d4e4d986c62b
```
https://www.data.gouv.fr/fr/datasets/liste-des-services-de-police-accueillant-du-public-avec-geolocalisation/

---

### API
#### Risques et détails par coordonnées et rayon
```
GET http://www.georisques.gouv.fr/api/v1/gaspar/risques?rayon=1000&latlon=1.0561541%2C%2049.4413171&page=1&page_size=10
```
http://www.georisques.gouv.fr/doc-api

---

#### Risques météorologiques
```
GET https://public.opendatasoft.com/api/records/1.0/search/?dataset=risques-meteorologiques-copy&q=Normandie&facet=crue_valeur&facet=nom_reg&facet=nom_dept&facet=etat_vent&facet=etat_pluie_inondation&facet=etat_orage&facet=etat_inondation&facet=etat_neige&facet=etat_canicule&facet=etat_grand_froid&facet=etat_avalanches
```
https://public.opendatasoft.com/explore/dataset/risques-meteorologiques-copy/api/

---

#### Catastrophes naturelles
```
GET http://www.georisques.gouv.fr/api/v1/gaspar/catnat?rayon=10000&latlon=1.0561541%2C%2049.4413171&page=1&page_size=10
```
http://www.georisques.gouv.fr/doc-api

---

#### Sites classés Seveso
```
GET https://public.opendatasoft.com/api/records/1.0/search/?dataset=sites-seveso&q=Lubrizol&lang=FR&facet=nom_epci&facet=nom_dep&facet=nom_reg
```
https://public.opendatasoft.com/explore/dataset/sites-seveso/api/

---

#### Inventaire matière déchets radiocatifs
```
GET https://public.opendatasoft.com/api/records/1.0/search/?dataset=inventaire-matieres-dechets-radioactifs&q=Rouen&facet=departement&facet=ville&facet=nom_du_site&facet=groupe_de_dechets&facet=categorie&facet=famille_in&facet=principaux_radionucleides
```
https://public.opendatasoft.com/explore/dataset/inventaire-matieres-dechets-radioactifs/api/

---

#### Aires de covoiturage
```
GET https://public.opendatasoft.com/api/records/1.0/search/?dataset=aires-covoiturage&q=Paris&facet=ville&facet=type_de_parking&facet=source&facet=pmr&facet=transport_public&facet=prix&facet=ouverture&facet=lumiere&facet=velo&facet=couv4gbytel&facet=couv4gsfr&facet=couv4gorange&facet=couv4gfree&facet=nom_epci&facet=nom_dep&facet=nom_reg
```
https://public.opendatasoft.com/explore/dataset/aires-covoiturage/api/

---

#### Équipement ponctuel de santé

```
GET https://public.opendatasoft.com/api/records/1.0/search/?dataset=equipement-ponctuel-grand-equipement-sante&q=Paris&facet=l_ep_maj&facet=l_ep_min&facet=c_suf1&facet=c_liaison&facet=l_voie&facet=c_niv3&facet=b_public&facet=c_gestion&facet=b_monument&facet=lib_ql1&facet=val_ql1&facet=lib_qn1&facet=n_sq_co&facet=n_sq_ee
```
https://public.opendatasoft.com/explore/dataset/equipement-ponctuel-grand-equipement-sante/api/

---


#### Liste des pharmacies
```
GET https://www.data.gouv.fr/fr/datasets/r/f602f919-b737-4897-ac92-5f6488a3e41a
```
https://www.data.gouv.fr/fr/datasets/pharmacies/
