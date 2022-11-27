CREATE EXTENSION IF NOT EXISTS "uuid-ossp";

CREATE TABLE IF NOT EXISTS "roles" (
    "id" uuid NOT NULL UNIQUE DEFAULT uuid_generate_v4(),
    "name" VARCHAR(255) NOT NULL,
    CONSTRAINT "roles_pk" PRIMARY KEY ("id")
) WITH (
  OIDS=FALSE
);

CREATE TABLE IF NOT EXISTS "users" (
    "id" uuid NOT NULL UNIQUE DEFAULT uuid_generate_v4(),
    "role_id" VARCHAR(20) NOT NULL,
    "email" VARCHAR(255) NOT NULL UNIQUE,
    "name" VARCHAR(20) NOT NULL,
    "password" VARCHAR(20) NOT NULL,
    "datetime" TIMESTAMP NOT NULL,
    "profile_picture" VARCHAR(255),
    "birthdate" DATE,
    CONSTRAINT "users_pk" PRIMARY KEY ("id")
) WITH (
  OIDS=FALSE
);

CREATE TABLE IF NOT EXISTS "articles" (
    "id" uuid NOT NULL UNIQUE DEFAULT uuid_generate_v4(),
    "author_id" VARCHAR(255) NOT NULL,
    "title" VARCHAR(50) NOT NULL UNIQUE,
    "datetime" TIMESTAMP NOT NULL,
    "content" TEXT NOT NULL UNIQUE,
    CONSTRAINT "articles_pk" PRIMARY KEY ("id")
) WITH (
  OIDS=FALSE
);

CREATE TABLE IF NOT EXISTS "comments" (
    "id" uuid NOT NULL UNIQUE DEFAULT uuid_generate_v4(),
    "author_id" VARCHAR(255) NOT NULL,
    "article_id" VARCHAR(255) NOT NULL,
    "datetime" TIMESTAMP NOT NULL,
    "content" TEXT NOT NULL,
    CONSTRAINT "comments_pk" PRIMARY KEY ("id")
) WITH (
  OIDS=FALSE
);

CREATE TABLE IF NOT EXISTS "responses_to_comment" (
    "id" uuid NOT NULL UNIQUE DEFAULT uuid_generate_v4(),
    "author_id" VARCHAR(255) NOT NULL,
    "comment_id" VARCHAR(255) NOT NULL,
    "datetime" TIMESTAMP NOT NULL,
    "content" TEXT NOT NULL,
    CONSTRAINT "responses_to_comment_pk" PRIMARY KEY ("id")
) WITH (
  OIDS=FALSE
);

ALTER TABLE "users" ADD CONSTRAINT "users_fk0" FOREIGN KEY ("role_id") REFERENCES "roles"("id");


ALTER TABLE "articles" ADD CONSTRAINT "articles_fk0" FOREIGN KEY ("author_id") REFERENCES "users"("id");

ALTER TABLE "comments" ADD CONSTRAINT "comments_fk0" FOREIGN KEY ("author_id") REFERENCES "users"("id");
ALTER TABLE "comments" ADD CONSTRAINT "comments_fk1" FOREIGN KEY ("article_id") REFERENCES "articles"("id");

ALTER TABLE "responses_to_comment" ADD CONSTRAINT "responses_to_comment_fk0" FOREIGN KEY ("author_id") REFERENCES "users"("id");
ALTER TABLE "responses_to_comment" ADD CONSTRAINT "responses_to_comment_fk1" FOREIGN KEY ("comment_id") REFERENCES "comments"("id");