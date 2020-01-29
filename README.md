# «NCD Sucht OPP Plattform» Prototype

Author: Robert Krieg

This prototype shows how to implement different mechanisms of the OPP platform. This should help the front- and backend developers to implement the Project with Craft CMS:


## Prerequisites
- Node & npm (> 10)
- Composer
- A local PHP & MySQL dev environment (e.g. Laravel Valet or Mamp)

## Install

1. Download repository
2. Run `composer install`
3. Run `npm install`
4. Create a local database
5. Update the `.env` file with credentials and keys
6. Make sure the `DEFAULT_SITE_URL` matches your local development url
7. Update the Algolie API keys in the `.env` file
8. Import the provided database dump with settings and test data into your database
9. Run `npm run dev` to build the frontend assets

You should be able to see the frontend in a styled format (with bulma) and run searches, that will work with Algolia.

You find necessary credentials and documentation in the corresponding Confluence documentation:

