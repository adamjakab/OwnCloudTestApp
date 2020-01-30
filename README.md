# OwnCloud TestApp
This is just a skeleton app for OwnCloud (tested on 10.3.2). 

## Usage
1) clone the repository
2) rename the containig folder to `testapp`
3) upload the folder inside the `apps-external` folder in your OwnCloud installation
4) go to Apps Management -> Disabled Apps and enable the app
5) now you should find it in the menu

## Notes
Experimental code. App is not signed (no signature.json), so integrity checks will fail producing the "There were problems with the code integrity check..." notification.


## Todos
- Implement use of language files
- show API endpoints in readme

## Resources
- Database: https://doc.owncloud.com/server/10.3/developer_manual/app/fundamentals/database.html
- XML Schema documentation: http://www.wiltonhotel.com/_ext/pear/docs/MDB2/docs/xml_schema_documentation.html
