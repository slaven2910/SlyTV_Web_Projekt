PGDMP         4                {            SlyTV    15.1    15.1 "               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    16525    SlyTV    DATABASE     {   CREATE DATABASE "SlyTV" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'German_Germany.1252';
    DROP DATABASE "SlyTV";
                User123    false            �            1259    16526    Movies    TABLE     �   CREATE TABLE public."Movies" (
    id integer NOT NULL,
    title character varying,
    genre character varying,
    publishingyear integer,
    plot character varying,
    image character varying,
    actors character varying
);
    DROP TABLE public."Movies";
       public         heap    postgres    false            �            1259    16531    Movies_ID_seq    SEQUENCE     �   CREATE SEQUENCE public."Movies_ID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public."Movies_ID_seq";
       public          postgres    false    214                       0    0    Movies_ID_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public."Movies_ID_seq" OWNED BY public."Movies".id;
          public          postgres    false    215            �            1259    16538    Users    TABLE     �   CREATE TABLE public."Users" (
    user_id bigint NOT NULL,
    username character varying NOT NULL,
    email character varying NOT NULL,
    password character varying NOT NULL
);
    DROP TABLE public."Users";
       public         heap    postgres    false            �            1259    16543    Users_userID_seq    SEQUENCE     {   CREATE SEQUENCE public."Users_userID_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public."Users_userID_seq";
       public          postgres    false    216                       0    0    Users_userID_seq    SEQUENCE OWNED BY     J   ALTER SEQUENCE public."Users_userID_seq" OWNED BY public."Users".user_id;
          public          postgres    false    217            �            1259    16544    movie_comments    TABLE     �   CREATE TABLE public.movie_comments (
    id integer NOT NULL,
    movie_id integer NOT NULL,
    user_id integer NOT NULL,
    comment text NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);
 "   DROP TABLE public.movie_comments;
       public         heap    postgres    false            �            1259    16550    movie_comments_id_seq    SEQUENCE     �   CREATE SEQUENCE public.movie_comments_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.movie_comments_id_seq;
       public          postgres    false    218                        0    0    movie_comments_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.movie_comments_id_seq OWNED BY public.movie_comments.id;
          public          postgres    false    219            �            1259    16551    movie_ratings    TABLE     �   CREATE TABLE public.movie_ratings (
    id integer NOT NULL,
    movie_id integer NOT NULL,
    user_id integer NOT NULL,
    rating integer,
    CONSTRAINT movie_ratings_rating_check CHECK (((rating >= 1) AND (rating <= 5)))
);
 !   DROP TABLE public.movie_ratings;
       public         heap    postgres    false            �            1259    16555    movie_ratings_id_seq    SEQUENCE     �   CREATE SEQUENCE public.movie_ratings_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.movie_ratings_id_seq;
       public          postgres    false    220            !           0    0    movie_ratings_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.movie_ratings_id_seq OWNED BY public.movie_ratings.id;
          public          postgres    false    221            �            1259    16556    pwdReset    TABLE     �   CREATE TABLE public."pwdReset" (
    id integer NOT NULL,
    email character varying,
    selector character varying,
    token character varying,
    expires integer
);
    DROP TABLE public."pwdReset";
       public         heap    postgres    false            �            1259    16561    pwdReset_id_seq    SEQUENCE     �   CREATE SEQUENCE public."pwdReset_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public."pwdReset_id_seq";
       public          postgres    false    222            "           0    0    pwdReset_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public."pwdReset_id_seq" OWNED BY public."pwdReset".id;
          public          postgres    false    223            y           2604    16569 	   Movies id    DEFAULT     j   ALTER TABLE ONLY public."Movies" ALTER COLUMN id SET DEFAULT nextval('public."Movies_ID_seq"'::regclass);
 :   ALTER TABLE public."Movies" ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    215    214            z           2604    16571    Users user_id    DEFAULT     q   ALTER TABLE ONLY public."Users" ALTER COLUMN user_id SET DEFAULT nextval('public."Users_userID_seq"'::regclass);
 >   ALTER TABLE public."Users" ALTER COLUMN user_id DROP DEFAULT;
       public          postgres    false    217    216            {           2604    16572    movie_comments id    DEFAULT     v   ALTER TABLE ONLY public.movie_comments ALTER COLUMN id SET DEFAULT nextval('public.movie_comments_id_seq'::regclass);
 @   ALTER TABLE public.movie_comments ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    219    218            }           2604    16573    movie_ratings id    DEFAULT     t   ALTER TABLE ONLY public.movie_ratings ALTER COLUMN id SET DEFAULT nextval('public.movie_ratings_id_seq'::regclass);
 ?   ALTER TABLE public.movie_ratings ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    221    220            ~           2604    16574    pwdReset id    DEFAULT     n   ALTER TABLE ONLY public."pwdReset" ALTER COLUMN id SET DEFAULT nextval('public."pwdReset_id_seq"'::regclass);
 <   ALTER TABLE public."pwdReset" ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    223    222                      0    16526    Movies 
   TABLE DATA           Y   COPY public."Movies" (id, title, genre, publishingyear, plot, image, actors) FROM stdin;
    public          postgres    false    214   $                 0    16538    Users 
   TABLE DATA           E   COPY public."Users" (user_id, username, email, password) FROM stdin;
    public          postgres    false    216   t,                 0    16544    movie_comments 
   TABLE DATA           T   COPY public.movie_comments (id, movie_id, user_id, comment, created_at) FROM stdin;
    public          postgres    false    218   �0                 0    16551    movie_ratings 
   TABLE DATA           F   COPY public.movie_ratings (id, movie_id, user_id, rating) FROM stdin;
    public          postgres    false    220   .6                 0    16556    pwdReset 
   TABLE DATA           I   COPY public."pwdReset" (id, email, selector, token, expires) FROM stdin;
    public          postgres    false    222   d7       #           0    0    Movies_ID_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public."Movies_ID_seq"', 1, false);
          public          postgres    false    215            $           0    0    Users_userID_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public."Users_userID_seq"', 20, true);
          public          postgres    false    217            %           0    0    movie_comments_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.movie_comments_id_seq', 391, true);
          public          postgres    false    219            &           0    0    movie_ratings_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.movie_ratings_id_seq', 34, true);
          public          postgres    false    221            '           0    0    pwdReset_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public."pwdReset_id_seq"', 8, true);
          public          postgres    false    223               V  x�uW�r#7<�_��ew#���k{�����eQE8�RDWw�D� �T��������'���B���{M� Teef�[���B'���ܱK}�����瓅���Zr3�d\���oLb
[�8���oy�.]mɕjä�����⧮�<�A�uæ�p�����<T}�x�7�Z7��~:yj8_�$�U�\r�I���@-!ȳ�&O{�L���R�����x�〈\�bG�+50�PWJ&�[Ҭ$R�Y�U�������Q�S��ڷ-���顐�f���އ��|2�d�1��P�SW�@��s�Q׽K���ZC�ZSi�%�Ӄ:@m�����/+J��2��O����Z��(Cx#T��DMJ�e�*G1*r����K�[��1���qD�Y!��o�^'� �~)'{O��sl]���ꁴq����X�d},�������@�Z�~G֞�5�d%�JƲ[�8%'��~�%b��g9�{��e��uaT73Y�q��j]�=UCz��,8�r=>��Y9�q ��PB�|�-+���{�jBQ�2�B.����dP�\ƂZ���p��web��c��B0<[8 ~��7}��3� H� A���瓇�v�`��c.��XX��rr�D�A���H�ċ��xQ����B�)�@&�� L<�pi/� ��Jd�3vи�����q�qf,r���M�S۳U����(2��%���!��u��Pb�Rj��7�Ŏ�?��7o���,�Fñ�]�e�nJa�԰���05��%�ޙ���Qt�ap&�&�%sk�^x)��I�]��uv��,x�Ș-������3 @@=����6�#j�&[�|L�"C�T����"!�=T �0P)��{��D]�#�$�1�L��\��g8M�}h�qs�>���Rﾇ8���X�`�.���,,آF_G(6�i���LM��!6����m5�������o����AS�*h�_4s��}���^�֊�q�Q�x��8�3�tF��-��c������I��Z�qF��v�hؖ#p��>��[�5h<�<`G�+�Ƞ���5�Ѱع�`G�@at+�q��M���;���mFҹ�_��t�~�B$��a�v�Q����U��De�evQ\��QM�Ԍ�����qp�v�սF�3�L�����iO���H{	2$x�!��R���U#UeYoO�v�ڄ�8}��g%�C1'��q�#��Ц�i#�BZ�
T�S�GPs{Y�4 Xk�D�!Kp���f��q1~8S�-����-*�CS�}E�2��H֦����6�����%�Y��M4i��c��D�jN����z��p�����N^gD�)��w�W����F_bx@�5�j�?0��@1fQA�3gf��Ap:@Bh�k1�E��!�>�΃�>W���I(ۿ@ľG� j���=�Z�!��T`�`Q(��0KBE����q�2$xnDu?�l��@����*HF1�A1�k(���GX�:��<qzk���I�t�(��)�`!^��d�/���2k�Gi�17����d|��ͺq��z^��c�7���VVu�X�ӣ\_I�㡩�2x���w����/Z8������{ǜ���l�;��,�`�>�1���/��ƚ��B	�^������2{�>t�0~v&�Z�~�?ț��q~���Ήw<5��T#}���ss���X��a6U�,<��2U��}^gq���u�ѕ�k�qjO�SM]�N�HP�j{�R:o�6���d��i-7%ii]t#�q�6�(�7ژ<�a�JRB�~��F�d�v6f���lD<�9�4Ѩ��A��Ro�L��Y��e�R>��C�t>��k3�H�V�n���鍗_N��9h<�ܺ*΋w�)9Aq�vh0-���Hj����0\(~�7��~�ȓ<0G$�e	�ez�<�>{\�$.��Dk�a�=�1��,�J�Ѯ��]y�(���ƻA��n����G���b �������Q���`��E�d:�B�/�`t8�?��_5F��6�㪇��M}E
ݻ���O�� zYI��~uJ���r��	��sZ,�e�N�QL����<I         a  x�uTێ�F}����V���0`me7�\����mмpi�Cs���A> ��0�����恪�U��.S`�iX2���
����>��G��h�5s�ڨ��[w���RO��~Jy�A�g�pH��m{f!o=�e��a;+�a��5,	=��dH��O;�>�F���v^������ކ�E$ZP���M��Rk�g���L΃쁇��Ec��W�N�~+ݝ��^�ʶb���^����~������@�y�*Q裙��{���Q�s6���o#�w]�tfH�u��r�D�I��!	UP���������Xlfm��f88Eb�g������ř\����G�ɭ���3Ք7��H�dy���<%��}v����i��0�X�^�K�g�n�	mT.R��I�H��R�v����1ͳ�65)
v�~��Ø����{��� ��c�^�8��i2�-m��E�]�6��ߋ3��H�3Ԗ����Sg���u�ӘK�E�X�5|w<L�紓��%�[]�)1�j �j�bj����!��m~���� ����R��ُ�G��s.��߯L����#[D����>Y��<k�`mF}h����E�$�kO��ɞ�osN�)K��UȠ�lvׂ0&�v��.r��U�W��ac�t����@���O�����<X�Q�i �vzV�#�f�'Mo���f��y}+��2��L��$'I^������of�¶mЪ�4�]O
�������&:t�:N�|��GD���\�W����x�;"|��>�%��oUZxUD'2�KK�8��MW�Ydk%%k�U/W�4d��Y��uf�fq��+F��%���=����	�&���� �qAf������I1S�,��D��ײ[s�̱x]j��,{�m?��[�Ԧ��Q��^��P��czвĔV�H6�xEUe(�(�]�<N�1�� ���h���Z�y���_������؎���\�ǽlH���M��x��dv����r��ݧ�`�)����'�&_�E��"����S5>�������	�!V�p�[���
����/?��]ؼeL���m�m9k� ldz�܉�D�"�R��|��:a�q'��&�'���!Z         9  x��Ms�6����@N=��� A�ri'3���^ r-"!�%���P�8N2�Ii���o����,>Ŋ,	�f$�; '=���ݿKe��f�$��d^1�JA����fw�`�e�2��3�ɝ�!�r�_�s��8:]{1�>Nv�Z���>��kH��� ��{�1�HtQ��Oz=zjX�ȱeL�6z��~Ї�<'�'k1�E�.Ym0��Zh�3�L����B���28�9��џɣ>��s��=FDg�Ò����Ǹ��Fw��hc����X9C��^�.6���u����%�\H�٘4��f:���S�:�5�r\��u�Ic@�EDﵱ�>}���O5@��'����8;.:剈]	��z7<�zp�.��*P<����0��	���-�a9�łtzڷ��<���`u�0`��.gQ�}Z�o�81K�/���/}����¶�����3�؊8_N�Yn�2K�sW�y�)Y�Pw��v��Ƣ�.;G3N��է���I���D���8���e.�:w��������ТI��1A|3�*���\�̜�`q̜�}r%fNY�o��iX�Vb�T�0s*��:̜�A�s,��Y��j�eRlƜ����H��ZM
uj#�,l�W!��D�&���N��]~��T�s�Wbf4�7afY��f��k13���1�x[˙ɨ�h�G�����ކZE���.��Z؜�V�<�����
y3ڜG���y�l��e��m��iǳ�f�q�]M;��7�-⺱���}�����]����j-m��[i�x�\K[ě��h��j��T��v<2\���{�Z�2�q[��*K.����*�"��ioD���WQq��9��"F��[$z���e��|�:�*�SUd����U8�f���5ߑ0ZQYq��LP9�;��a�~G-x��"�j~yw����K�{s��*H&+�+�R��s)�*�,�����'�0N=i\�2����=������C��wb�3~��VoHctO��Sxj3C�){�hb��4��$<b�B�� 6��j�;��tF��wt�t�N�{O�08nj]����ɧi�4��X�������>%1hRc��|�cC���� ������Ϧ���Q��O�ǹ��Z���)�J��L�K9��rn(��2��湚�g57U��TrEs>�3�Y�M�<��S��,�W�|n��4+�s����;9���и���u�n����w_�����iQfB��[I�K���B~3]�B"���$KU��Β�����N�ᇝ�?�x�T�Q�ł�� EGN���᣷
�-&�T��,v�_���ݿ~v	>         &  x�-�[!��0Aԙ���ϱT��I��e)a����|�Ծ�����u��u����c������0~K�ކjE�LEE�u�2I�1z��t�$���y9�ivZFw��v�2�����d墱|����Cci�Ѷ��ncӢO�w�e�-�r�&rŀ.v�;�;y%vibo/�	��`?��k��kQG
��,إ�.C��]yb�&�n�[����Կ��:R�󌾰�A��'�Ņ]K�0�+_�^Xŵ�UXp]K�Q�[P��E0s'M'��1��5�Mc�u�t��X��?�� �]�           x�E�Mo�0 ��s��K�7�Dac�ŉ٥��(�����e[�ޟ�X5ؾ��Ū�qZXu��>Y���F�sO�j0!��I��˸<gs7~,�nӪt�����T0X��yz��K/��{����#�B2̅��� ��Oӻ�7�g�3��,�)F~12�*�aC��n�zИ$�z7��_1�sC>�.Q�FUyR	|�����:���O�KzJsd�9��cOMK[ȃu�ϛ/j�ühw	�.-,I컮�	����]�H�-.0�	s>��87��c�     