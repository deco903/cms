PGDMP         .            	    y            blog_cms    10.12    10.12 6    3           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            4           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            5           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            6           1262    42214    blog_cms    DATABASE     ?   CREATE DATABASE blog_cms WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_Indonesia.1252' LC_CTYPE = 'English_Indonesia.1252';
    DROP DATABASE blog_cms;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            7           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    3                        3079    12924    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            8           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            ?            1259    42256    category    TABLE     ?   CREATE TABLE public.category (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.category;
       public         postgres    false    3            ?            1259    42254    category_id_seq    SEQUENCE     x   CREATE SEQUENCE public.category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.category_id_seq;
       public       postgres    false    202    3            9           0    0    category_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.category_id_seq OWNED BY public.category.id;
            public       postgres    false    201            ?            1259    42217 
   migrations    TABLE     ?   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         postgres    false    3            ?            1259    42215    migrations_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public       postgres    false    3    197            :           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
            public       postgres    false    196            ?            1259    42236    password_resets    TABLE     ?   CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 #   DROP TABLE public.password_resets;
       public         postgres    false    3            ?            1259    42278    posts    TABLE     ?  CREATE TABLE public.posts (
    id bigint NOT NULL,
    judul character varying(255) NOT NULL,
    category_id integer NOT NULL,
    content text NOT NULL,
    gambar character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    slug character varying(255),
    deleted_at timestamp(0) without time zone,
    users_id integer
);
    DROP TABLE public.posts;
       public         postgres    false    3            ?            1259    42276    posts_id_seq    SEQUENCE     u   CREATE SEQUENCE public.posts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.posts_id_seq;
       public       postgres    false    206    3            ;           0    0    posts_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.posts_id_seq OWNED BY public.posts.id;
            public       postgres    false    205            ?            1259    42306 
   posts_tags    TABLE     ?   CREATE TABLE public.posts_tags (
    id bigint NOT NULL,
    posts_id integer NOT NULL,
    tags_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.posts_tags;
       public         postgres    false    3            ?            1259    42304    posts_tags_id_seq    SEQUENCE     z   CREATE SEQUENCE public.posts_tags_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.posts_tags_id_seq;
       public       postgres    false    208    3            <           0    0    posts_tags_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.posts_tags_id_seq OWNED BY public.posts_tags.id;
            public       postgres    false    207            ?            1259    42267    tags    TABLE     ?   CREATE TABLE public.tags (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.tags;
       public         postgres    false    3            ?            1259    42265    tags_id_seq    SEQUENCE     t   CREATE SEQUENCE public.tags_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.tags_id_seq;
       public       postgres    false    3    204            =           0    0    tags_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.tags_id_seq OWNED BY public.tags.id;
            public       postgres    false    203            ?            1259    42225    users    TABLE     ?  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    tipe boolean DEFAULT false NOT NULL
);
    DROP TABLE public.users;
       public         postgres    false    3            ?            1259    42223    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public       postgres    false    199    3            >           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
            public       postgres    false    198            ?
           2604    42259    category id    DEFAULT     j   ALTER TABLE ONLY public.category ALTER COLUMN id SET DEFAULT nextval('public.category_id_seq'::regclass);
 :   ALTER TABLE public.category ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    202    201    202            ?
           2604    42220    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    196    197    197            ?
           2604    42281    posts id    DEFAULT     d   ALTER TABLE ONLY public.posts ALTER COLUMN id SET DEFAULT nextval('public.posts_id_seq'::regclass);
 7   ALTER TABLE public.posts ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    205    206    206            ?
           2604    42309    posts_tags id    DEFAULT     n   ALTER TABLE ONLY public.posts_tags ALTER COLUMN id SET DEFAULT nextval('public.posts_tags_id_seq'::regclass);
 <   ALTER TABLE public.posts_tags ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    207    208    208            ?
           2604    42270    tags id    DEFAULT     b   ALTER TABLE ONLY public.tags ALTER COLUMN id SET DEFAULT nextval('public.tags_id_seq'::regclass);
 6   ALTER TABLE public.tags ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    204    203    204            ?
           2604    42228    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    198    199    199            *          0    42256    category 
   TABLE DATA               J   COPY public.category (id, name, slug, created_at, updated_at) FROM stdin;
    public       postgres    false    202   ?8       %          0    42217 
   migrations 
   TABLE DATA               :   COPY public.migrations (id, migration, batch) FROM stdin;
    public       postgres    false    197   :       (          0    42236    password_resets 
   TABLE DATA               C   COPY public.password_resets (email, token, created_at) FROM stdin;
    public       postgres    false    200   ?:       .          0    42278    posts 
   TABLE DATA               |   COPY public.posts (id, judul, category_id, content, gambar, created_at, updated_at, slug, deleted_at, users_id) FROM stdin;
    public       postgres    false    206   ;       0          0    42306 
   posts_tags 
   TABLE DATA               S   COPY public.posts_tags (id, posts_id, tags_id, created_at, updated_at) FROM stdin;
    public       postgres    false    208   ?<       ,          0    42267    tags 
   TABLE DATA               F   COPY public.tags (id, name, slug, created_at, updated_at) FROM stdin;
    public       postgres    false    204   ?=       '          0    42225    users 
   TABLE DATA               {   COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at, tipe) FROM stdin;
    public       postgres    false    199   ;>       ?           0    0    category_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.category_id_seq', 15, true);
            public       postgres    false    201            @           0    0    migrations_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.migrations_id_seq', 13, true);
            public       postgres    false    196            A           0    0    posts_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.posts_id_seq', 44, true);
            public       postgres    false    205            B           0    0    posts_tags_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.posts_tags_id_seq', 60, true);
            public       postgres    false    207            C           0    0    tags_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.tags_id_seq', 16, true);
            public       postgres    false    203            D           0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 7, true);
            public       postgres    false    198            ?
           2606    42264    category category_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.category
    ADD CONSTRAINT category_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.category DROP CONSTRAINT category_pkey;
       public         postgres    false    202            ?
           2606    42222    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public         postgres    false    197            ?
           2606    42286    posts posts_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.posts
    ADD CONSTRAINT posts_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.posts DROP CONSTRAINT posts_pkey;
       public         postgres    false    206            ?
           2606    42311    posts_tags posts_tags_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.posts_tags
    ADD CONSTRAINT posts_tags_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.posts_tags DROP CONSTRAINT posts_tags_pkey;
       public         postgres    false    208            ?
           2606    42275    tags tags_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.tags
    ADD CONSTRAINT tags_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.tags DROP CONSTRAINT tags_pkey;
       public         postgres    false    204            ?
           2606    42235    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public         postgres    false    199            ?
           2606    42233    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public         postgres    false    199            ?
           1259    42242    password_resets_email_index    INDEX     X   CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);
 /   DROP INDEX public.password_resets_email_index;
       public         postgres    false    200            *   )  x?u??n? ???S?L?@??,???(%???ɞl??6b7?瓏?1X?٥???ߦ??q??????
??ƻ?W????{?І??k??[y?}?%'??uיo??C?z}.1?ŸN!vI??Aq?DL?ywb}L?3h?@E??NJ?Ԧ??xӔ?9ג諛8خ?u]b?<?6?5QO<穟.?:?H???mRc~??Z?9????سT?<????D??3g?心????v?n?@[?????r????9?o?%^???Z??[??L?:1?????skir???ۓǦ??? ?n???      %   ?   x?U?[?? E??Ōl!??H-4???T@U???y44??s?P??2)?e?9E_"?sL?????!P? ????5??)?X?bDQ?h?lmȾ???aJ????@s????{jhwN*)ݣ?cLyn?UP.?Z%?}?_???p?-V^?:?a??xN??-m?DuR??VN??y???(?}U?6??)??p??1,????>?Ƣ?????X????? ?(|?      (      x?????? ? ?      .   x  x?}?]?? ???S??????G??e???V0h???/J?ڒM0?o>f@??J׶?j??m???k:e:?=??=a}k.?????n?R?"ϲ??Qv??O???Y?98?J?D??`?_???e.X?d???E"vЩ?âBU??:??? ??Ws<??韷X?OL???՗{}?R?beS???????eء6??;]	Ǯ??A;???J便Y?E?i?H?m?VN????;2????jC}??-??ƌE?d?`??n4?j:?Q???`\??s?g?(??)?le4?^?8??RԦ?ƿ? 
)??|????l8?̥?????ς?>???????o???????P+K4*??x[f??:???|YY????:I??qp?      0   ?   x?M??1CϞbVI?|??
??:?AF???L?':O??????87?"?W	w4P9A?ƥ*?/T??????'?.?WıA???W&i????!J?4Ȩ92?ӂ?B?vL??????h?kU??q
8???c<?2???:/U'?ڵ?n?t?Tck???:?????#&???s?c=???.Ǽ????=?1h6?h??<??h?t"      ,   ?   x?m?A
?0E??)z??L?T????4$m?4=?;?,߃?`f8???ױY?qs??? ??Z4-]??,?aɸ0???????JK?8r??[8?X?:%9 šW?~??C??H_%?q??C?8??j`z????#?B??T>??;2h5I?????;??a??E??? ?;???      '   Z  x?m?Ko?@???+X?u?@?Y??R?l?y8?Wa误?Mr?soNr???`?????O???>K?9O??F?n?? V?B??5w??X???-??"g??!?q?p???$S-4-?ͪxc??c??jC4??N?P??"	gU???^?|Ѵ??E??9T?????V???p?mM?mݺ?;?f\>??Q??1?O?	U Ua??EU?????:M;᡽$r? ??̮/?׻H?`e??]O.?5?t?fy?r??!?tҼ?????UE????"5/????h?_*N^??[d?5?G?!h}?}?????X???,"????L{f?%?P߻xbS?)&?rN@?o?T??     