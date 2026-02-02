# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

R3PUBLIQUE is a Symfony 6.4 (PHP 8.1+) educational web application about the French Republic, featuring an interactive quiz game. It uses Doctrine ORM with MySQL, Twig templates, and AssetMapper for frontend assets.

## Common Commands

```bash
# Start Symfony dev server
symfony server:start
# or
php -S localhost:8000 -t public/

# Install dependencies
composer install

# Database
php bin/console doctrine:migrations:migrate   # Run migrations
php bin/console make:migration                 # Create new migration
php bin/console make:entity                    # Create/update entity

# Cache
php bin/console cache:clear

# Tests
php bin/phpunit                               # Run all tests
php bin/phpunit tests/Path/To/TestFile.php    # Run single test file

# Docker (PostgreSQL + Mailpit)
docker compose up -d
```

## Architecture

**MVC pattern** with Symfony conventions:

- **`src/Controller/`** — Route handlers using PHP attribute routing
  - `LaRepubliqueController` → `/` (homepage)
  - `QuizzController` → `/quizz` (GET/POST quiz game logic)
- **`src/Entity/`** — Doctrine ORM entities (`Quizz` with question, 4 answers, goodanswer)
- **`src/Repository/`** — Data access (`QuizzRepository::findRandom()` for random questions)
- **`templates/`** — Twig templates extending `base.html.twig` (shared header/footer/nav)
- **`public/css/`, `public/img/`, `public/fonts/`** — Static assets served directly
- **`assets/`** — JavaScript (Stimulus controllers) and CSS managed by AssetMapper/importmap

**Database:** MySQL (`mysql://root:@127.0.0.1:3306/quizz` in `.env`), with Docker alternative providing PostgreSQL.

**Services:** Autowiring and auto-configuration enabled. All classes in `src/` registered under `App\` namespace.

## Team Branches

Active developer branches: `leo`, `mathias`, `patrice` off `main`.
