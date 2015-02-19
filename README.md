#SEAS Forms
This is a project to enable forms to be generated for any election/voting event held by SEAS

##Admin
The Administration page has two options
* Manage Forms
 * Enables admins to create new forms (and subforms)
 * Enables admins to delete a form (removes all pages and tables)
* Form Reports
 * Enables admins to view reports generated for existing forms
* User Administration
 * Enables admins to modify the admin user table

##Forms
To access in each form users must log in. Both the form landing page/login page can be found at
`[base_url]/{form_name}`. In addition each form is comprised of sub_forms. These are the actual forms that comprise
of the actual form (i.e. Form - Elections, has subforms - President, Secretary, etc). Subforms are found at
`[base_url]/{form_name}/{subform_name}`.

##SubForms
Each subform will (eventually) have the ability to restrict access based on:
* Attribute from predefined Student and Faculty table
* GWID login

In addition SubForms will have fields that have the given attributes:
* Field Name
* Explanation
* (Opt) Predefined Values
* (Opt) Field Restrictions