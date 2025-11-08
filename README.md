# 🌾 Design Pattern Strategy avec Symfony

[![Symfony](https://img.shields.io/badge/Symfony-7.3-000000.svg?style=flat&logo=symfony)](https://symfony.com/)
[![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4.svg?style=flat&logo=php)](https://php.net/)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

## 📖 Objectif du Projet

Ce projet illustre l'évolution des approches de programmation en comparant trois méthodes différentes pour résoudre le même problème : **l'analyse de différents types de céréales**.

### 🎯 Objectifs Pédagogiques

- **Comprendre l'évolution** des pratiques de programmation
- **Comparer les approches** : If/Else, Match (PHP 8+), et Design Pattern Strategy
- **Illustrer les principes SOLID** en pratique
- **Démontrer l'importance** du principe Ouvert/Fermé (Open/Closed Principle)

### 🔄 Approches Comparées

| Approche | Route | Description |
|----------|-------|-------------|
| **If/Else** | `/if` | Méthode traditionnelle avec des conditions |
| **Match** | `/match` | Expression moderne de PHP 8+ |
| **Strategy Pattern** | `/pattern` | Solution professionnelle respectant SOLID |

## 🚀 Installation et Lancement

### Prérequis

- **PHP 8.1+**
- **Composer**
- **Symfony CLI** (optionnel)

### 1. Cloner le Projet

```bash
git clone git@github.com:yoanbernabeu/Design-Pattern-avec-Symfony---Strategy.git
cd Design-Pattern-avec-Symfony---Strategy
```

### 2. Installer les Dépendances

```bash
composer install
```

### 3. Lancer le Serveur de Développement

#### Option A : Avec Symfony CLI
```bash
symfony serve
```

#### Option B : Avec le serveur Symfony
```bash
php bin/console server:start
```

### 4. Accéder à l'Application

Ouvrez votre navigateur et accédez à : **http://localhost:8000**

## 🗺️ Navigation

### Pages Disponibles

- **🏠 Accueil** : `/` - Présentation générale et explication des concepts
- **❌ If/Else** : `/if` - Approche traditionnelle avec ses limitations
- **🔄 Match** : `/match` - Expression moderne de PHP 8+
- **✅ Strategy Pattern** : `/pattern` - Solution professionnelle

### Parcours Recommandé

1. **Commencer par l'accueil** pour comprendre le contexte
2. **Explorer If/Else** pour voir les limitations
3. **Découvrir Match** pour voir les améliorations
4. **Terminer par Strategy** pour comprendre la solution optimale

## 🏗️ Architecture du Projet

### Structure des Services

```
src/Service/
├── If/
│   └── CerealAnalyseIfService.php          # Approche If/Else
├── Match/
│   └── CerealAnalyseMatchService.php       # Approche Match
└── Strategy/
    ├── AnalyseCerealInterface.php          # Interface commune
    ├── CerealAnalyseManager.php            # Gestionnaire des stratégies
    ├── BleAnalyse.php                      # Stratégie pour le blé
    ├── OrgeAnalyse.php                     # Stratégie pour l'orge
    └── TournesolAnalyse.php                # Stratégie pour le tournesol
```

### Templates

```
templates/demo/
├── home.html.twig                          # Page d'accueil
├── if.html.twig                            # Démo If/Else
├── match.html.twig                         # Démo Match
├── pattern.html.twig                       # Démo Strategy Pattern
├── _navigation.html.twig                   # Navigation partagée
└── _comparison_table.html.twig             # Tableau de comparaison
```

## 🎓 Concepts Expliqués

### Principe Ouvert/Fermé (Open/Closed Principle)

> **"Les entités logicielles doivent être ouvertes à l'extension, mais fermées à la modification"**

#### ❌ Violation (If/Else et Match)
```php
if ($cereal === 'ble') {
    return $this->analyserBle($cereal);
} elseif ($cereal === 'orge') {
    return $this->analyserOrge($cereal);
} elseif ($cereal === 'tournesol') {
    return $this->analyserTournesol($cereal);
} elseif ($cereal === 'colza') {  // ← MODIFICATION NÉCESSAIRE
    return $this->analyserColza($cereal);
}
```

#### ✅ Respect (Strategy Pattern)
```php
class ColzaAnalyse implements AnalyseCerealInterface {
    public function supports(string $cereal): bool { ... }
    public function analyse(string $cereal): string { ... }
}
// ← NOUVELLE CLASSE, AUCUNE MODIFICATION
```

### Principes SOLID

| Principe | Description | Application dans le projet |
|----------|-------------|---------------------------|
| **S** - Single Responsibility | Une classe, une responsabilité | Chaque stratégie analyse un seul type de céréale |
| **O** - Open/Closed | Ouvert à l'extension, fermé à la modification | Ajout de nouvelles stratégies sans modification |
| **L** - Liskov Substitution | Les sous-types doivent être substituables | Toutes les stratégies sont interchangeables |
| **I** - Interface Segregation | Interfaces spécifiques et focalisées | Interface simple avec 2 méthodes |
| **D** - Dependency Inversion | Dépendre des abstractions, pas du concret | Injection de l'interface, pas des implémentations |

## 🧪 Exemples de Céréales

Le projet analyse les types suivants :

- **🌾 Blé** : "Riche en glucides et protéines, idéal pour la panification"
- **🌾 Orge** : "Excellente source de fibres, utilisée pour le malt et l'alimentation animale"
- **🌻 Tournesol** : "Très riche en huile et vitamine E, parfait pour la production d'huile alimentaire"
- **🌿 Colza** : Erreur (aucune stratégie disponible) - pour démontrer la gestion d'erreurs

## 🛠️ Technologies Utilisées

- **Symfony 7.3** - Framework PHP
- **PHP 8.1+** - Langage de programmation
- **Twig** - Moteur de templates
- **Asset Mapper** - Gestion des assets
- **Dependency Injection** - Injection de dépendances


## 💡 Inspirations

Ce projet s'inspire de plusieurs conférences et ressources :

### 🎤 Conférences API Platform 2025

- **[Design Pattern, le trésor est dans le vendor](https://api-platform.com/fr/con/2025/conferences/#design-pattern-le-tresor-est-dans-le-vendor)** par Smaïne Milianni
  - *"Les design patterns ne sont pas que de simples concepts théoriques : ils sont au cœur des applications que nous utilisons au quotidien !"*
  - Inspiration principale pour l'approche pédagogique des Design Patterns

- **[Symfony et l'Injection de Dépendances : Du passé au futur](https://api-platform.com/fr/con/2025/conferences/#symfony-et-l-injection-de-dependances-du-passe-au-futur)** par Imen Ezzine
  - *"L'Injection de Dépendances est un pilier fondamental de Symfony"*
  - Inspiration pour la partie injection de dépendances et l'utilisation du conteneur Symfony

### 📚 Ressources Pédagogiques

- [Documentation Symfony](https://symfony.com/doc/current/index.html)
- [Design Patterns - Strategy](https://refactoring.guru/design-patterns/strategy)
- [Principes SOLID](https://en.wikipedia.org/wiki/SOLID)
- [PHP 8 Match Expression](https://www.php.net/manual/en/control-structures.match.php)

### Concepts Clés

- **Design Patterns** : Solutions réutilisables aux problèmes courants
- **Injection de Dépendances** : Principe d'inversion de contrôle
- **Interfaces** : Contrats définissant le comportement
- **Polymorphisme** : Capacité d'utiliser différentes implémentations

## 📄 Licence

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

## 👨‍💻 Auteur

**Ludovic MOYO**
- GitHub: [@ludovicdevio](https://github.com/ludovicdevio)
- Projet: [Design-Pattern-Strategy-Symfony](https://github.com/ludovicdevio/Design-Pattern-Strategy-Symfony)

---

**Bon apprentissage ! 🌾✨**
