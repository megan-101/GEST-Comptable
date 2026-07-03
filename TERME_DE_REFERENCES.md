# TERME DE RÉFÉRENCES

## Système de gestion et transformation des opérations comptables

## 1. Contexte du projet

Une organisation multi-sites souhaite mettre en place un système de gestion comptable simplifié permettant :

- la saisie des opérations comptables par les utilisateurs
- la transformation automatique de ces opérations en écritures comptables
- l'application de règles métier codées dans l'application
- la traçabilité complète des transformations

Chaque utilisateur appartient à un lieu, et chaque lieu dispose d'un poste comptable influençant la génération des écritures.

## 2. Objectifs pédagogiques

Ce projet permet aux étudiants de :

- Concevoir une architecture Laravel modulaire
- Manipuler des relations Eloquent complexes
- Implémenter un moteur de transformation métier
- Travailler en équipe avec GitLab (branches, merge requests)
- Mettre en place des tests automatisés
- Comprendre un flux comptable simplifié

## 3. Périmètre fonctionnel

- Gestion des utilisateurs
- Gestion des lieux et postes comptables
- Saisie des opérations comptables
- Gestion des modèles de transformation
- Génération des écritures comptables
- Génération des lignes comptables
- Application de règles métier codées
- Journalisation des transformations

## 4. Acteurs du système

### Administrateur

- Gère les utilisateurs
- Gère les lieux
- Gère les postes comptables
- Configure les modèles

### Opérateur comptable

- Saisit les opérations
- Consulte les écritures générées
- Suit les statuts des opérations

### Système

- Transforme les opérations en écritures
- Applique les règles métier
- Génère les journaux comptables

## 5. Modèle de données

- **Utilisateur** (id: entier; nom: chaine de caractère; email: chaine de caractère; password: chaine de caractère; lieu_id: int)
- **Lieu** (id: entier; code: chaine de caractères; libellé: chaine de caractère; adresse: chaine de caractère)
- **Poste comptable** (id: entier; code: chaine de caractère; libellé: chaine de caractère; lieu_id: entier)
- **Modèle de transformation** (id; ide_schema; flag_piece; mask_piece; flag_compte; mask_compte)
- **Opération** (id: entier; reference: chaine de caractère; pca: entier [poste comptable]; compte: string; date_operation: date; montant: entier; libelle: chaine de caractères; user_id: entier; modele_id: entier; statut: chaine de caractère / entier; nature: chaine de caractères; type_op: V-N)
- **Écriture comptable** (id: entier; numero: chaine de caractère; date: date; operation_id: entier; devise: string)
- **Ligne comptable** (id: entier; ecriture_id: entier; compte: chaine de caractère; type_op: C-D; montant: entier; ref: string)

## 6. Workflow fonctionnel

1. Saisie d'une opération
2. Validation des champs (flags et masks)
3. Application du modèle
4. Exécution des règles métier (code Laravel)
5. Génération de l'écriture comptable
6. Génération des lignes comptables
7. Journalisation des opérations

## 7. Architecture recommandée

```
app/
├── Models
├── Http/Controllers
├── Http/Requests
├── Services
│   ├── OperationService
│   ├── TransformationService
│   └── AccountingService
├── Rules (logique métier codée)
├── Events
└── Listeners
```

## 8. Livrables attendus

- Code source sur GitLab
- Documentation du projet
- Diagramme UML des classes
- Script de base de données
- Jeux de données de test
- Démonstration fonctionnelle
