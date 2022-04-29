Table users {
  id int [pk, increment]
  email varchar [unique, not null]
  email_verified_at timestamp
  password varchar [not null]
  role_id integer
}

Table users_meta {
  id int [pk, increment]
  user_id int
  meta_key varchar
  meta_value longtext
}

Table roles {
  id int [pk, increment]
  name varchar [not null]
}

Table permissions {
  id int [pk, increment]
  role_id int
  capabilities longtext
  updated_by int
  deleted_by int
}

Table websites {
  id int [pk, increment]
  domain varchar [unique, not null]
  subdomain varchar [unique, not null]
  client_email varchar
 // website_data_id int
  updated_by int // lastModifiedBy
  deleted_by int
}

Table website_data {
  id int [pk, increment]
  name longtext
  isActive boolean [default: false]
  isTheme boolean [default: false]
  initVersion varchar
  type varchar // if Theme {parent, child}
  website_id int
  updated_by int
  deleted_by int
}

Table miscellaneous_meta {
  id int [pk, increment]
  website_id int
  meta_key varchar
  meta_value longtext
}

// Table plugins {
//   id int [pk, increment]
//   name longtext
//   isActive boolean [default: false]
//   initVersion varchar
//   website_id int
//   //version_id int
//   updated_by int
//   deleted_by int
// }

// Table themes {
//   id int [pk, increment]
//   name longtext
//   type varchar // parent / child
//   isActive boolean [default: false]
//   initVersion varchar
//   website_id int
//   //version_id int
//   updated_by int
//   deleted_by int
// }

Table versions {
  id int [pk, increment]
  isPlugin boolean [default: false]
  uuid int
  current_version varchar
  updated_version varchar
  updated_by int
  deleted_by int
}

Table system_options {
  id int [pk, increment]
  option_name varchar
  option_value longtext
  updated_by int
  deleted_by int
}

Ref: "users"."role_id" < "roles"."id"

Ref: "users"."id" < "users_meta"."user_id"


Ref: "websites"."updated_by" < "users"."id"

Ref: "websites"."deleted_by" < "users"."id"

// Ref: "website_data"."plugins_id" < "plugins"."id"

// Ref: "website_data"."theme_id" < "themes"."id"

Ref: "permissions"."updated_by" < "users"."id"

Ref: "permissions"."deleted_by" < "users"."id"

// Ref: "website_data"."updated_by" < "users"."id"

// Ref: "website_data"."deleted_by" < "users"."id"

//Ref: "plugins"."updated_by" < "users"."id"

//Ref: "plugins"."deleted_by" < "users"."id"

//Ref: "themes"."updated_by" < "users"."id"

//Ref: "themes"."deleted_by" < "users"."id"

Ref: "versions"."updated_by" < "users"."id"

Ref: "versions"."deleted_by" < "users"."id"

Ref: "system_options"."updated_by" < "users"."id"

Ref: "system_options"."deleted_by" < "users"."id"

//Ref: "plugins"."version_id" < "versions"."id"

//Ref: "themes"."version_id" < "versions"."id"

Ref: "roles"."id" < "permissions"."role_id"

Ref: "websites"."id" < "miscellaneous_meta"."website_id"

//Ref: "websites"."id" < "plugins"."website_id"

//Ref: "websites"."id" < "themes"."website_id"

//Ref: "versions"."uuid" < "themes"."id"

//Ref: "versions"."uuid" < "plugins"."id"

Ref: "websites"."id" < "website_data"."website_id"

Ref: "versions"."uuid" < "website_data"."id"