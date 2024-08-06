# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## 2024-08-06

### Changed

- Cleaned up some code and some tests.
- Removed unused and unnecessary PHP interfaces.

## 2024-08-04

### Added

- Added Behat for testing use cases. It's better suited than PHPUnit.

### Changed

- Cleaned up some code and added some software to keep the codebase clean.

## 2024-08-02

### Added

- Added Rector.
- Tried an abstract use case test class to have a framework for tests at different abstraction levels.

### Changed

- Use PHPUnit instead of Pest.

## 2024-07-31

### Added

- The ability to (also) remember Bible verses.
- The ability to remove all (learnt) lessons and verses.bash
- Production build via FrankenPHP.

### Changed

- Cleaned up some code.

## 2024-07-30

### Added

- Integration with SonarCloud via SonarLint plugin in PHPStorm.
- Code style via Laravel Pint.

### Changed

- Refactored to a simple Symfony CLI application.

## 2024-07-28

### Added

- Ability to renounce a lesson that God has learnt me (personally).

### Changed

- Refactored code to UseCase pattern.
- Improved Quality of Life.

### Removed

- Removed the Obsidian workspace file from Git.

## 2024-07-27

### Added

- Simple README for running the application.

### Changed

- Cleaned up the repository.

## 2024-07-26

### Added

- First Bible verse.
- Docker Compose for easier development.
- Production build to distribute application as a standalone Linux binary.