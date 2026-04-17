# CLAUDE.md

## Project

Symfony 8.0 + API Platform 4.2 REST API. PHP 8.5, PostgreSQL 17, Doctrine ORM 3.6, DDEV for local dev.

## Dev setup

```bash
composer install
ddev start
ddev launch   # open in browser
```

## Common commands

```bash
# Full pipeline (prepare → lint → test)
ddev composer run build

# Format code
ddev composer run prepare

# Tests only (CS check + PHPStan + Doctrine schema + Codeception)
ddev composer run test

# Generate HTML test report + PHP Metrics
ddev composer run report

# Database
ddev console doctrine:migrations:migrate
ddev adminer   # database UI
```

## Code style

- **PHP CS Fixer** with `@Symfony` + risky rules. Run via `composer run prepare` (auto-fix) or `composer run test` (dry-run check).
- **PHPStan** at level 10. Analyzes `src/` and `config/`.
- Strict comparisons, strict params, `mb_str_functions` enforced.
- All deprecation notices, warnings, and PHPUnit useless tests are fatal in tests.

## Testing

Four Codeception suites — run in this order by CI:

| Suite | What it tests | DB |
|---|---|---|
| `Unit` | Pure logic, no framework | — |
| `Functional` | Symfony container + Doctrine | SQLite (auto-created) |
| `Rest` | API endpoints via HTTP | SQLite |
| `Acceptance` | Browser (PhpBrowser) | — |

Test DB is SQLite at `data/database_test.sqlite` (see `.env.test`). Production uses PostgreSQL.

```bash
vendor/bin/codecept run          # all suites
vendor/bin/codecept run Rest     # single suite
```

## Architecture

- **API Platform resources** go in `src/ApiResource/` using PHP 8 attributes (`#[ApiResource]`).
- **Entities** in `src/Entity/` use Doctrine attribute mapping (`#[ORM\Entity]`).
- **State providers/processors** in `src/State/Provider/` and `src/State/Processor/`.
- API is **stateless** by default (configured in `config/packages/api_platform.yaml`).
- Swagger UI available at `/api/docs` in dev.

## CI

GitHub Actions (`.github/workflows/symfony.yml`) runs on push to `develop` and PRs to `master`:
1. PHP 8.4 setup
2. `composer install`
3. Create SQLite test DB
4. `vendor/bin/codecept run`
