PGDMP                         {            LatestSlyTv    14.5    14.5 "               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    17386    LatestSlyTv    DATABASE     k   CREATE DATABASE "LatestSlyTv" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'English_Germany.1252';
    DROP DATABASE "LatestSlyTv";
                postgres    false            �            1259    17422    Movies    TABLE     �   CREATE TABLE public."Movies" (
    id integer NOT NULL,
    title character varying,
    genre character varying,
    publishingyear integer,
    plot character varying,
    image character varying,
    actors character varying,
    user_id integer
);
    DROP TABLE public."Movies";
       public         heap    postgres    false            �            1259    17427    Movies_ID_seq    SEQUENCE     �   CREATE SEQUENCE public."Movies_ID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public."Movies_ID_seq";
       public          postgres    false    209                       0    0    Movies_ID_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public."Movies_ID_seq" OWNED BY public."Movies".id;
          public          postgres    false    210            �            1259    17428    Users    TABLE     �   CREATE TABLE public."Users" (
    user_id bigint NOT NULL,
    username character varying NOT NULL,
    email character varying NOT NULL,
    password character varying NOT NULL
);
    DROP TABLE public."Users";
       public         heap    postgres    false            �            1259    17433    Users_userID_seq    SEQUENCE     {   CREATE SEQUENCE public."Users_userID_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public."Users_userID_seq";
       public          postgres    false    211                       0    0    Users_userID_seq    SEQUENCE OWNED BY     J   ALTER SEQUENCE public."Users_userID_seq" OWNED BY public."Users".user_id;
          public          postgres    false    212            �            1259    17434    movie_comments    TABLE     �   CREATE TABLE public.movie_comments (
    id integer NOT NULL,
    movie_id integer NOT NULL,
    user_id integer NOT NULL,
    comment text NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);
 "   DROP TABLE public.movie_comments;
       public         heap    postgres    false            �            1259    17440    movie_comments_id_seq    SEQUENCE     �   CREATE SEQUENCE public.movie_comments_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.movie_comments_id_seq;
       public          postgres    false    213                       0    0    movie_comments_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.movie_comments_id_seq OWNED BY public.movie_comments.id;
          public          postgres    false    214            �            1259    17441    movie_ratings    TABLE     �   CREATE TABLE public.movie_ratings (
    id integer NOT NULL,
    movie_id integer NOT NULL,
    user_id integer NOT NULL,
    rating integer,
    CONSTRAINT movie_ratings_rating_check CHECK (((rating >= 1) AND (rating <= 5)))
);
 !   DROP TABLE public.movie_ratings;
       public         heap    postgres    false            �            1259    17445    movie_ratings_id_seq    SEQUENCE     �   CREATE SEQUENCE public.movie_ratings_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.movie_ratings_id_seq;
       public          postgres    false    215                       0    0    movie_ratings_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.movie_ratings_id_seq OWNED BY public.movie_ratings.id;
          public          postgres    false    216            �            1259    17446    pwdReset    TABLE     �   CREATE TABLE public."pwdReset" (
    id integer NOT NULL,
    email character varying,
    selector character varying,
    token character varying,
    expires integer
);
    DROP TABLE public."pwdReset";
       public         heap    postgres    false            �            1259    17451    pwdReset_id_seq    SEQUENCE     �   CREATE SEQUENCE public."pwdReset_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public."pwdReset_id_seq";
       public          postgres    false    217                       0    0    pwdReset_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public."pwdReset_id_seq" OWNED BY public."pwdReset".id;
          public          postgres    false    218            p           2604    17452 	   Movies id    DEFAULT     j   ALTER TABLE ONLY public."Movies" ALTER COLUMN id SET DEFAULT nextval('public."Movies_ID_seq"'::regclass);
 :   ALTER TABLE public."Movies" ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    210    209            q           2604    17453    Users user_id    DEFAULT     q   ALTER TABLE ONLY public."Users" ALTER COLUMN user_id SET DEFAULT nextval('public."Users_userID_seq"'::regclass);
 >   ALTER TABLE public."Users" ALTER COLUMN user_id DROP DEFAULT;
       public          postgres    false    212    211            s           2604    17454    movie_comments id    DEFAULT     v   ALTER TABLE ONLY public.movie_comments ALTER COLUMN id SET DEFAULT nextval('public.movie_comments_id_seq'::regclass);
 @   ALTER TABLE public.movie_comments ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    214    213            t           2604    17455    movie_ratings id    DEFAULT     t   ALTER TABLE ONLY public.movie_ratings ALTER COLUMN id SET DEFAULT nextval('public.movie_ratings_id_seq'::regclass);
 ?   ALTER TABLE public.movie_ratings ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    216    215            v           2604    17456    pwdReset id    DEFAULT     n   ALTER TABLE ONLY public."pwdReset" ALTER COLUMN id SET DEFAULT nextval('public."pwdReset_id_seq"'::regclass);
 <   ALTER TABLE public."pwdReset" ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    218    217                      0    17422    Movies 
   TABLE DATA           b   COPY public."Movies" (id, title, genre, publishingyear, plot, image, actors, user_id) FROM stdin;
    public          postgres    false    209   /$                 0    17428    Users 
   TABLE DATA           E   COPY public."Users" (user_id, username, email, password) FROM stdin;
    public          postgres    false    211   W,                 0    17434    movie_comments 
   TABLE DATA           T   COPY public.movie_comments (id, movie_id, user_id, comment, created_at) FROM stdin;
    public          postgres    false    213   �0                 0    17441    movie_ratings 
   TABLE DATA           F   COPY public.movie_ratings (id, movie_id, user_id, rating) FROM stdin;
    public          postgres    false    215   G6       
          0    17446    pwdReset 
   TABLE DATA           I   COPY public."pwdReset" (id, email, selector, token, expires) FROM stdin;
    public          postgres    false    217   �7                  0    0    Movies_ID_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public."Movies_ID_seq"', 1, false);
          public          postgres    false    210                       0    0    Users_userID_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public."Users_userID_seq"', 21, true);
          public          postgres    false    212                       0    0    movie_comments_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.movie_comments_id_seq', 392, true);
          public          postgres    false    214                       0    0    movie_ratings_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.movie_ratings_id_seq', 35, true);
          public          postgres    false    216                       0    0    pwdReset_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public."pwdReset_id_seq"', 8, true);
          public          postgres    false    218                 x�uW�r�F<s��n���Ѭ�c)�5z�ZRE8�R�@��nlw�|r�?|ٳ���/qV�,{�2#�����*|�<�Bw�;�5��,�i8�����ONNO��,�m0�2�6>82��`
�R��H�p�x߹�
�x%����8����T�d>,k�O�&��]݋�+w���w[�L���H֦����&���s�m������jr�	��,�R�nJ7�H��nP�	������7�jvt�N�t��żkq���j�pw�n����דG�ؙb��#�W ?�({qI��z�0�$&&_N�ekc���e@�� 2�t�Z�V','�xe��v�]0�C��j��$%�������X�Ǡ2w�6{:7KFQ��n������4�3����9a��{:�{�4�H�&��te}0L��!�a=�s�8�|��V�4YF�d[Sdv-���N> �T�ҡ��0 (|h}Р�� �����jꢐ�R��Y��������ꕝ�����!q��ֲK�E3�0�dld�`Z^|;������	 ����t����do�Gp���'���`������<�����X+�Ҋq�k»�B[�ò3��U
��)jKK��c�o�8�_�Nmˁ[+�) ���+Ml95XrL�{�ʕ���'C��?�������U$Iu��t �i�����:���l�GA2�z���lE��1��q�|�=��憞| \M�{�B�%0�B�����
�:rɺ�` I�"�`�N~;�߳s�Vfc��p���	�&����D���Z��<Ø�&���/4dM���U� -�(F�6)��b`f�����H��7{��7a�q��b	��A��V:p�Ƅz�h�1�ʼ�(* y8��vkE�M��sn9�|�^�aG��Tu�*|�X�N�r���S=���#�������@�o�����`��J]ӊ��+�ți~Zp����P��ŔU��������SwT���}Q���;J�GQ�(�xc,��C����N6���Άl3��Z�Vv�*��5�I��`X>]�:������%����N�"x����!1]�j�(?���W�)\��A7Õ���LϨ��Z�`�?BiL߀��
�F�@cD�������蝵���J�CG8�o��7m$$Z�;�P}���܎VR*O��j��O��ǡ��\� ��Z#4��\��P_�.��75��rE���C�����)�ҡ�`%�R@~�P���f���DM��l�v㷸���]u.;�S���QZ�d	��^{�!W��+_�G�M��4���ӀW��- um
�򭨌2���1�(���V#N
��Yh��Tu\$cB&��	b�")���KH�p΂:2H�=�0�G�%k�ǂ��C��Ht�X��.c�K�	]s_��0����p���ɗ�{M��o��hGA���B����\<�6����#�y֨�#�]37�~\AR��I/(�|q�f�%�r+�:��Whx:�l�7���`d�]�ޫ����a�Kܠ���%�-�k�_M:��!ŷ�8ఘ'�� �|�dŒ��g%�Q����-B�d42Y-����&i���A�a��v��F���:n�ҫ��9��g�#W�m�ۤ���t7K�]T=|�0=�]�B���Gs���1�*�
�?'�>uګ�i'o&�=�����_(;�PX���r��ë���K��A"L��.�k�T΀U��Z�_�m�����Ͽ���/8&{^���K��^s�q�^[�V�W��E�;��әi:���a��[��OA[�h�k�^�is�[���s���qToUNa�`���Z	f#t��z�`H�\?jm)N���v�6C�G��q���cG~��%h1NP��w��r~6�<4��cu[��q���KB�����vm_�|��Q���<�	T �)t2&d����>h���;y�^�،B���,�g��1��'ӥWy�D�j�z���.���R��$}D�:>��a�6hݘ�����{����y         �  x�uTَ�F}���F�����fef���l���L��b���A> ����I�g�@�K!�=�ܪ�":(rI��1s�����T��$>���̢a0[s1\����v��nkL�K�V�43�3���Sjˋ�3吕�7 5@*!�#"��A>����r�v1�{�j9�L��4R��s�(O���:��"Ŝ(덕^l"0Qъ0A�"�������Ⱦ��m���o�<�<��J��ь��準u���s
�LN�=Y�(���ӑ��a��T#�|$~˾����U�3��D�״�F��x��B�id�G�K�W ����~a'�$���6߽����Lz����po1�9f&�W���)QmUkp����}�I��P�D`� �����-�ʒ��2��U�����z�{)�����+ϱ�8\�==�����K�D�)�r$����{��Z[���Ұ��c�B�}��x#(�^��^R��и�ljL'���=�(�(��@U���/���X=gmծd����������UCK� �JwX׈;�]��J��$��X���q����� ����K�U1e3��������ad��][�݄_8qy�Pr��o6�{O,<���Ӕx:a)c��	�8��Xb6�ZG1�_��LPg�rDIsdc?w�z/�?�������uQ��_,���lg���;�������ݡ��T��>��DqӴ 	_�m��D$:�ٮ;�e�q�S\��f�I��v^�Ö��nIoY���h�$;����_���G�� ��K¥��' r��ꠕnM�k
����y8R���˓���ͩ,JrH�&0�/��~7��{�C�~=;����"`�S�X�&�Wj�T,˙��Z|=	���njg,����I��gۏ��Է���Z\f��ǽĞI R	5Xy�sJ!ZM9º�uq�ǫ%���O ~����~-�����/�q�py���������*�c��a�*W�������s[�yպNc�6_�{%)�(E<_�( �0*򇧧z|��g�!���ˇ6�AT�/Fm������q����G�>h�*��{�Z���ݕ�Z�Z0Wl�[y��-��t�8�ÐH�$U��R�ؤ���/�Yw���BM鲟MN��&X�.��"�ԙ7��q�A֗4j�T^ƢO��� G�9-         9  x��Ms�6����@N=��� A�ri'3���^ r-"!�%���P�8N2�Ii���o����,>Ŋ,	�f$�; '=���ݿKe��f�$��d^1�JA����fw�`�e�2��3�ɝ�!�r�_�s��8:]{1�>Nv�Z���>��kH��� ��{�1�HtQ��Oz=zjX�ȱeL�6z��~Ї�<'�'k1�E�.Ym0��Zh�3�L����B���28�9��џɣ>��s��=FDg�Ò����Ǹ��Fw��hc����X9C��^�.6���u����%�\H�٘4��f:���S�:�5�r\��u�Ic@�EDﵱ�>}���O5@��'����8;.:剈]	��z7<�zp�.��*P<����0��	���-�a9�łtzڷ��<���`u�0`��.gQ�}Z�o�81K�/���/}����¶�����3�؊8_N�Yn�2K�sW�y�)Y�Pw��v��Ƣ�.;G3N��է���I���D���8���e.�:w��������ТI��1A|3�*���\�̜�`q̜�}r%fNY�o��iX�Vb�T�0s*��:̜�A�s,��Y��j�eRlƜ����H��ZM
uj#�,l�W!��D�&���N��]~��T�s�Wbf4�7afY��f��k13���1�x[˙ɨ�h�G�����ކZE���.��Z؜�V�<�����
y3ڜG���y�l��e��m��iǳ�f�q�]M;��7�-⺱���}�����]����j-m��[i�x�\K[ě��h��j��T��v<2\���{�Z�2�q[��*K.����*�"��ioD���WQq��9��"F��[$z���e��|�:�*�SUd����U8�f���5ߑ0ZQYq��LP9�;��a�~G-x��"�j~yw����K�{s��*H&+�+�R��s)�*�,�����'�0N=i\�2����=������C��wb�3~��VoHctO��Sxj3C�){�hb��4��$<b�B�� 6��j�;��tF��wt�t�N�{O�08nj]����ɧi�4��X�������>%1hRc��|�cC���� ������Ϧ���Q��O�ǹ��Z���)�J��L�K9��rn(��2��湚�g57U��TrEs>�3�Y�M�<��S��,�W�|n��4+�s����;9���и���u�n����w_�����iQfB��[I�K���B~3]�B"���$KU��Β�����N�ᇝ�?�x�T�Q�ł�� EGN���᣷
�-&�T��,v�_���ݿ~v	>         *  x�-�[!��0)A�ݻ���=�����eaѿ�i���iS���˖��v�;:?���ګs�o���P�蒩�袷nP&I8F�V�n�$��3;/G7�N��R��Uf��Rݘ�\4�oӘ�yh,��1�� ��mbZ�	��L��[.Ҥ@�Х��Qb�Wb'��.M����!�C� �q-�q-�H!����e�]>�+O���ޭ|kJ��;����ӑz�3���A�F,����a�gW�����go��ຖ֣x��;0Y�`/� N�n���b\kk	�����wX����0I�~���_R      
     x�E�Mo�0 ��s��K�7�Dac�ŉ٥��(�����e[�ޟ�X5ؾ��Ū�qZXu��>Y���F�sO�j0!��I��˸<gs7~,�nӪt�����T0X��yz��K/��{����#�B2̅��� ��Oӻ�7�g�3��,�)F~12�*�aC��n�zИ$�z7��_1�sC>�.Q�FUyR	|�����:���O�KzJsd�9��cOMK[ȃu�ϛ/j�ühw	�.-,I컮�	����]�H�-.0�	s>��87��c�     