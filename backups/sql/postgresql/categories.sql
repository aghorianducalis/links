create table categories
(
    id          bigserial
        primary key,
    parent_id   bigint,
    title       varchar(255) not null
        constraint categories_title_unique
            unique,
    description text         not null,
    created_at  timestamp(0),
    updated_at  timestamp(0)
);

alter table categories
    owner to postgresql_db_user;

INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (1, null, 'mind map', '', '2023-04-26 14:20:33', '2023-04-26 14:20:33');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (2, null, 'evolution', '', '2023-04-26 14:20:33', '2023-04-26 14:20:33');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (3, null, 'civilization', '', '2023-04-26 14:20:33', '2023-04-26 14:20:33');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (4, null, 'books', '', '2023-04-26 14:20:33', '2023-04-26 14:20:33');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (5, null, 'media', '', '2023-04-26 14:20:33', '2023-04-26 14:20:33');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (6, null, 'culture', '', '2023-04-26 14:20:33', '2023-04-26 14:20:33');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (7, null, 'ai', '', '2023-04-26 14:20:33', '2023-04-26 14:20:33');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (8, null, 'physics', '', '2023-04-26 14:20:33', '2023-04-26 14:20:33');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (9, null, 'it', '', '2023-04-26 14:20:33', '2023-04-26 14:20:33');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (10, null, 'math', '', '2023-04-26 14:20:33', '2023-04-26 14:20:33');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (11, null, 'manifold', '', '2023-04-26 14:20:33', '2023-04-26 14:20:33');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (12, null, 'games', '', '2023-04-26 14:20:33', '2023-04-26 14:20:33');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (13, null, 'cell', '', '2023-04-26 14:20:33', '2023-04-26 14:20:33');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (14, null, 'chrome', '', '2023-04-26 14:20:33', '2023-04-26 14:20:33');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (15, null, 'android', '', '2023-04-26 14:20:33', '2023-04-26 14:20:33');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (16, null, 'docker', '', '2023-04-26 14:20:33', '2023-04-26 14:20:33');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (17, null, 'dou.ua', '', '2023-04-26 14:20:33', '2023-04-26 14:20:33');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (18, null, 'evolution redis', '', '2023-04-26 14:20:33', '2023-04-26 14:20:33');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (19, null, 'git', '', '2023-04-26 14:20:33', '2023-04-26 14:20:33');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (20, null, 'laravel', '', '2023-04-26 14:20:34', '2023-04-26 14:20:34');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (21, null, 'laravel auth', '', '2023-04-26 14:20:34', '2023-04-26 14:20:34');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (22, null, 'laravel composer', '', '2023-04-26 14:20:34', '2023-04-26 14:20:34');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (23, null, 'laravel media library', '', '2023-04-26 14:20:34', '2023-04-26 14:20:34');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (24, null, 'laravel package development', '', '2023-04-26 14:20:34', '2023-04-26 14:20:34');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (25, null, 'laravel eloquent', '', '2023-04-26 14:20:34', '2023-04-26 14:20:34');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (26, null, 'laravel datatables', '', '2023-04-26 14:20:34', '2023-04-26 14:20:34');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (27, null, 'laravel selectize', '', '2023-04-26 14:20:34', '2023-04-26 14:20:34');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (28, null, 'laravel tags', '', '2023-04-26 14:20:34', '2023-04-26 14:20:34');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (29, null, 'smartphone_tabs', '', '2023-04-26 14:20:34', '2023-04-26 14:20:34');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (30, null, 'ssl', '', '2023-04-26 14:20:34', '2023-04-26 14:20:34');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (31, null, 'software', '', '2023-04-26 14:20:34', '2023-04-26 14:20:34');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (32, null, 'software jetbrains', '', '2023-04-26 14:20:34', '2023-04-26 14:20:34');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (33, null, 'software ubuntu', '', '2023-04-26 14:20:34', '2023-04-26 14:20:34');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (34, null, 'social', '', '2023-04-26 14:20:34', '2023-04-26 14:20:34');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (35, null, 'self projects', '', '2023-04-26 14:20:34', '2023-04-26 14:20:34');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (36, null, 'music', '', '2023-04-26 14:20:34', '2023-04-26 14:20:34');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (37, null, 'ubuntu', '', '2023-04-26 14:20:35', '2023-04-26 14:20:35');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (38, null, 'jetbrains', '', '2023-04-26 14:20:35', '2023-04-26 14:20:35');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (39, null, 'redis', '', '2023-04-26 14:20:36', '2023-04-26 14:20:36');
INSERT INTO public.categories (id, parent_id, title, description, created_at, updated_at) VALUES (40, null, 'chess', '', '2023-04-26 14:20:36', '2023-04-26 14:20:36');
