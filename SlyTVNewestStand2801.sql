PGDMP         9                 {            SlyTV    15.0    15.0 .    =           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            >           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            ?           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            @           1262    16398    SlyTV    DATABASE     {   CREATE DATABASE "SlyTV" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'German_Germany.1252';
    DROP DATABASE "SlyTV";
                postgres    false            �            1259    16502    Movies    TABLE     �   CREATE TABLE public."Movies" (
    id integer NOT NULL,
    title character varying,
    genre character varying,
    publishingyear integer,
    plot character varying,
    image bytea,
    actors character varying
);
    DROP TABLE public."Movies";
       public         heap    postgres    false            �            1259    16501    Movies_ID_seq    SEQUENCE     �   CREATE SEQUENCE public."Movies_ID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public."Movies_ID_seq";
       public          postgres    false    217            A           0    0    Movies_ID_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public."Movies_ID_seq" OWNED BY public."Movies".id;
          public          postgres    false    216            �            1259    16511    Series    TABLE       CREATE TABLE public."Series" (
    id integer NOT NULL,
    title character varying,
    seasons integer,
    episodes integer,
    genre character varying,
    publishingyear integer,
    plot character varying,
    image bytea,
    actors character varying
);
    DROP TABLE public."Series";
       public         heap    postgres    false            �            1259    16510    Series_ID_seq    SEQUENCE     �   CREATE SEQUENCE public."Series_ID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public."Series_ID_seq";
       public          postgres    false    219            B           0    0    Series_ID_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public."Series_ID_seq" OWNED BY public."Series".id;
          public          postgres    false    218            �            1259    16409    Users    TABLE     �   CREATE TABLE public."Users" (
    user_id bigint NOT NULL,
    username character varying NOT NULL,
    email character varying NOT NULL,
    password character varying NOT NULL
);
    DROP TABLE public."Users";
       public         heap    postgres    false            �            1259    16408    Users_userID_seq    SEQUENCE     {   CREATE SEQUENCE public."Users_userID_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public."Users_userID_seq";
       public          postgres    false    215            C           0    0    Users_userID_seq    SEQUENCE OWNED BY     J   ALTER SEQUENCE public."Users_userID_seq" OWNED BY public."Users".user_id;
          public          postgres    false    214            �            1259    16542    movie_comments    TABLE     �   CREATE TABLE public.movie_comments (
    id integer NOT NULL,
    movie_id integer NOT NULL,
    user_id integer NOT NULL,
    comment text NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);
 "   DROP TABLE public.movie_comments;
       public         heap    postgres    false            �            1259    16548    movie_comments_id_seq    SEQUENCE     �   CREATE SEQUENCE public.movie_comments_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.movie_comments_id_seq;
       public          postgres    false    222            D           0    0    movie_comments_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.movie_comments_id_seq OWNED BY public.movie_comments.id;
          public          postgres    false    223            �            1259    16549    movie_ratings    TABLE     �   CREATE TABLE public.movie_ratings (
    id integer NOT NULL,
    movie_id integer,
    user_id integer,
    rating integer,
    CONSTRAINT movie_ratings_rating_check CHECK (((rating >= 1) AND (rating <= 5)))
);
 !   DROP TABLE public.movie_ratings;
       public         heap    postgres    false            �            1259    16553    movie_ratings_id_seq    SEQUENCE     �   CREATE SEQUENCE public.movie_ratings_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.movie_ratings_id_seq;
       public          postgres    false    224            E           0    0    movie_ratings_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.movie_ratings_id_seq OWNED BY public.movie_ratings.id;
          public          postgres    false    225            �            1259    16530    pwdReset    TABLE     �   CREATE TABLE public."pwdReset" (
    id integer NOT NULL,
    email character varying,
    selector character varying,
    token character varying,
    expires integer
);
    DROP TABLE public."pwdReset";
       public         heap    postgres    false            �            1259    16529    pwdReset_id_seq    SEQUENCE     �   CREATE SEQUENCE public."pwdReset_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public."pwdReset_id_seq";
       public          postgres    false    221            F           0    0    pwdReset_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public."pwdReset_id_seq" OWNED BY public."pwdReset".id;
          public          postgres    false    220            �            1259    16554    series_comments    TABLE     �   CREATE TABLE public.series_comments (
    id integer NOT NULL,
    series_id integer NOT NULL,
    user_id integer NOT NULL,
    comment text NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);
 #   DROP TABLE public.series_comments;
       public         heap    postgres    false            �            1259    16560    series_comments_id_seq    SEQUENCE     �   CREATE SEQUENCE public.series_comments_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.series_comments_id_seq;
       public          postgres    false    226            G           0    0    series_comments_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.series_comments_id_seq OWNED BY public.series_comments.id;
          public          postgres    false    227            �           2604    16561 	   Movies id    DEFAULT     j   ALTER TABLE ONLY public."Movies" ALTER COLUMN id SET DEFAULT nextval('public."Movies_ID_seq"'::regclass);
 :   ALTER TABLE public."Movies" ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    217    216    217            �           2604    16514 	   Series id    DEFAULT     j   ALTER TABLE ONLY public."Series" ALTER COLUMN id SET DEFAULT nextval('public."Series_ID_seq"'::regclass);
 :   ALTER TABLE public."Series" ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    218    219    219            �           2604    16562    Users user_id    DEFAULT     q   ALTER TABLE ONLY public."Users" ALTER COLUMN user_id SET DEFAULT nextval('public."Users_userID_seq"'::regclass);
 >   ALTER TABLE public."Users" ALTER COLUMN user_id DROP DEFAULT;
       public          postgres    false    214    215    215            �           2604    16563    movie_comments id    DEFAULT     v   ALTER TABLE ONLY public.movie_comments ALTER COLUMN id SET DEFAULT nextval('public.movie_comments_id_seq'::regclass);
 @   ALTER TABLE public.movie_comments ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    223    222            �           2604    16564    movie_ratings id    DEFAULT     t   ALTER TABLE ONLY public.movie_ratings ALTER COLUMN id SET DEFAULT nextval('public.movie_ratings_id_seq'::regclass);
 ?   ALTER TABLE public.movie_ratings ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    225    224            �           2604    16533    pwdReset id    DEFAULT     n   ALTER TABLE ONLY public."pwdReset" ALTER COLUMN id SET DEFAULT nextval('public."pwdReset_id_seq"'::regclass);
 <   ALTER TABLE public."pwdReset" ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    220    221    221            �           2604    16565    series_comments id    DEFAULT     x   ALTER TABLE ONLY public.series_comments ALTER COLUMN id SET DEFAULT nextval('public.series_comments_id_seq'::regclass);
 A   ALTER TABLE public.series_comments ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    227    226            0          0    16502    Movies 
   TABLE DATA           Y   COPY public."Movies" (id, title, genre, publishingyear, plot, image, actors) FROM stdin;
    public          postgres    false    217   �1       2          0    16511    Series 
   TABLE DATA           l   COPY public."Series" (id, title, seasons, episodes, genre, publishingyear, plot, image, actors) FROM stdin;
    public          postgres    false    219   �6       .          0    16409    Users 
   TABLE DATA           E   COPY public."Users" (user_id, username, email, password) FROM stdin;
    public          postgres    false    215   =       5          0    16542    movie_comments 
   TABLE DATA           T   COPY public.movie_comments (id, movie_id, user_id, comment, created_at) FROM stdin;
    public          postgres    false    222   �?       7          0    16549    movie_ratings 
   TABLE DATA           F   COPY public.movie_ratings (id, movie_id, user_id, rating) FROM stdin;
    public          postgres    false    224   cD       4          0    16530    pwdReset 
   TABLE DATA           I   COPY public."pwdReset" (id, email, selector, token, expires) FROM stdin;
    public          postgres    false    221   �E       9          0    16554    series_comments 
   TABLE DATA           V   COPY public.series_comments (id, series_id, user_id, comment, created_at) FROM stdin;
    public          postgres    false    226   ,F       H           0    0    Movies_ID_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public."Movies_ID_seq"', 1, false);
          public          postgres    false    216            I           0    0    Series_ID_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public."Series_ID_seq"', 1, false);
          public          postgres    false    218            J           0    0    Users_userID_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public."Users_userID_seq"', 13, true);
          public          postgres    false    214            K           0    0    movie_comments_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.movie_comments_id_seq', 249, true);
          public          postgres    false    223            L           0    0    movie_ratings_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.movie_ratings_id_seq', 1, true);
          public          postgres    false    225            M           0    0    pwdReset_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public."pwdReset_id_seq"', 3, true);
          public          postgres    false    220            N           0    0    series_comments_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.series_comments_id_seq', 1, false);
          public          postgres    false    227            0     x��VIv�6]S��.��v$�Z*��1����Ѧ,H� ��[�U^�MֹEn����!���"Q����e󒶩���z�n���Y^]^4ת��ȟ0e�{�G\����U2�*s�!��9)Roy���ޑoՊI���/����s��x�����у�ְ�1(mȯ�{ny���I��P�꼹�e�1�<�j`�V�G��eX�"tj�ӱ�o��iV�W<�T�XAeC�"�����0�v˚���z����<�eñy����6/'(�K�r��ǒW!���L����ڝ��w*G��P���<o,~
q��4+�k#����Ȯ�,b��Y�絉7R����@tTQ��+H	�c�Xʐ^�i� Xh���$����΢[�������-A���OY����Ysͻ�F�l�Η�]M�;��h>�
f�}�Wឣ\��>�wImm�ǵ1鶚 ��
7�!��d�
�h�%�Ln���@���d�Y��!�^~.}��Z����}@���\p	��J�?�N���`599'�*ba�j��JΔ��@v�x\�*Pl�M]�/цڭs'�(�/�,nj�ˬ˫�Z�d��(�N1�<8[���l,w� `Kr�S�E4���*�TǪ�L'��"Dfm|p��)p�c������Z��w_�e[&1w�O�_TT���4C"Mn(S�E�3���"��{��Q�lm�=�M��{�L�T���"�S����`��G�BA�sa+=�-Bl�Fb�1��hj���q�1���>op���`���s_Ŵ<���G��G�ԅ�7�>M�T�>̀W��K9��	t�I��!����ݐ�76�Y����M>��[�d��������EDH͵�jT�꽗A2y���6AW����T��9@-��<dC�q��i��[�e5��(R�8�iXN���;�ƴ�Fh5�Gn�Ì�����!�@C��d��"̴!o���"�iX�����A�dԗi
�l���� Z·�}���^#�8֩6D��8|� ��`i0"�N�cՀ/-.�f&H b"z��VZ��䷍Xh�o�崜^��_���ہ���-���l ���V2	�p�E+*���ׇq(^C���L!+d_H����N��y1='罎�?���d�*�ښzS:JTiz7urc�լ���u��9ڋ�Tc</��|�B��^���%Z�*�Mӧa�kPT�E���A�8!�U[j�%�{��}a$�A״ӿ����c�W����߁
���u�nʑ߉�!v�(ѡ S�0x�8::��M��      2   #  x�uV]s�6|����ȉ%�r����|4N��L^� H�q �����R�!w�cK4����a�^Ro57�c9ؤ��K��B�4=|�'��X.�[�\y��w6�Ƶ]�Gm8��^��F�;��)wΐמB��O6e9-��s؅~��!kl?�h�C��`�����9��R�����d)��˗�+{s�6k���=[��8���H��Z�Gk�4��*Yn6�����6&;�W�l�_g�����F`��J����n���޻��os@q@��ȍMɕ.�ĸ�;�tǽ-k�1����w�=A}�n3�h��U'u�V��V�1�ۙ����9J7��SgA��xIO�v��AHY��{F�k�����fQ������Ae?�,�k���Qtt�$̧UBKP�7sYk�0��fl������+�$Z��>O�V�j������G�1�o;�L�P��l�R�@�D�D-���]` "����(#P�f :2�.�J��z/�{�;��f*���d��L��z�Flrڦ�"�O�K]�,
�/��k5w�[.�-
pM�UØ'����~)@A���q@�G�$H<��w�})	�8:��)�¢ﴑ�l�Ƹs;����iҐ���Z��� nu	W@��$��R/�{ާr��K[�-�K�N�=|;ɡ�y��ybaĜ�3�%��0�BG9S8�wS�}�4"�_���Mm��#L��z��l�'d��{"�4���yP���d�E{�nk�'��b[��S�,�� E��Q�ȟ�v��l�lk7�'��O��%�G��R���w�o�}�6��PyW��$�Yj���e]�=�*:/���Y'6��G���=Et���3�����#s�`<g_���6�U�$|4>$W��V<�)�Iq�R�������Յz��8����?�Y�˂�v�	�/J���h]Ͻ�J�_���um���.v:dCB�v~�����~u�V������#�&�) ��<���)����M����#@[h	�e��r�ܠ���"E�yhe��r4�U�(�'L�H_���S=�l.ڦv��ICZ����Y�,���#���_�S�1E�2(N+����x@��[&��J'f�w�g7��){�+�][����#gY?O�+ ���w�\,f~Eq����O�xh��|*�8#�^��?���������ö߫l����1s��,CY���`���m�� �d�}���Dmk�k��_�i	&�/��K����T6�(�`����,cTN Uru��u���2)*+�L���W�e��l~n�E	4�2`�93*):�]G'oG�9����%0�O�K�JS�P[-e��n��+|�K�=Ŗ��T9W�o�NN�O?E!�5v�;��d��=��2F�l]B���>��߸�gz�?�IH�����d�~��q�\lr�(T�Ө׮"2�a��o9��g���Oj;Lh����VJ��p�}\�
1V�ܨ��I�,�>`:��%Iv�`�1 $�1���R2�� �Qidn
�t���,^�����na<��PL�U��'�<8;;�A��.      .   �  x����r�:@����;`�?5��������!ɼ*�.��t�T��SG�eCL0U����J
ĤME=�'�}
��l�2��L"h���@�������ؒt"I�);e�n�Rzvh��``?p,K]?�u^ݙ��8� ܎�t�����o&���ƃ�qd�'�i����\ZCK��:�����ï��.��b����<e�o��?<��%����Q�}- ���v2�"i&����&� �������@��4�+�����
F�3g,l%W��<��r��.	P��O˔�\�o:����t.�_E�CP���a.m��1�E��r����M׌����ի�)���q�c�,hef��`?3�3���}��L�T�=.@nGbb�_�jA&T�r����d�'F55p�WF�&ͱ��]����X�4���4^=�g����*� ���m0�!�R�<ꗷ�K�<�q�K����{���G�����9ϯ��.�r�����������B�Vӭ�����v����p(�� ���m� ���"h��_$Ku_�"{8"D�|@���cu�H~�D�\V�)}%h�in��"Iӆ��3��7����ـ�x[���Ý�[��B5�C�l5"Vs�Q{{���"����2���2~gh��j]�      5   �  x��V�r�8���E\	�������@$��$t$d����4m�jY
,�1=��3 ����@on��Nȡ��Q<�Ԅu�5x�~6Ս\��0�7?x{�݇��c��k���pƣ��C�����7�a��-�[�e��X0É����6v�?��%BJ�<d�	��ur��_i|�����S��m� �P��j��@��x>6i��O�1��o[ߧ+�x�u�:����4���i��T7k|TOt���\�������v��9���&��P~{����b��^-PB���zU4�}nm��F�rC�&��C��ҽ3�܏����Z��O���#�8u�mu���B�*i�س�D�bK�-��}�g�B��勇��šءm�?P�q�E�{W���ܴ�F�FL�l�/a���sh'���à,ŵc��[h6˳;oN(���u��i:�6�_���[��垕! ������|�S6�����P��у�Ѐu"�7s8�x7�77t9Df8��p�?�&����l�=
�F�VCA�@7��sE3���hJ1�RH^��4��K�-�m��'(ӘK�TCBf���p�T�V�b#5�l4��N�a�.
]��)��FO;�y���W��>��#�����E�K>��C:���}ܺ�GW���5�[�8�	XM�̂���������'X)��t�l���ʣ�Oa�S�2B�i��ВТ�ި۩_ï��iM%��[఺3�ǀJV�c���E�g���#8��^��
�1��ZS��Q�e!XZ&�����
^��*�*mx���P��`��
�}�����V[;w��i�����H#W*��B�R��X\^{� �u�9!�@�gQ��Ȏ�jK
�9W(K�b#�g��B�"�B�y��yG>8FUBUTak�.�7�ƚjeK+��� $O��.�(:Yg>qC�<d$��B�4����kR��b
é���>��g|��4�����D�3����+3K�V*��9�|��6�+c�7Gq�i�5V[�A�+A�(��Ͳ��KԜ��yKwb��Jl!��Y�c��{�M��J�˅��"79c�$�\�bG��Ŕ+>�
�K�H^�PA�d^OvZ�Ycd�	�8���B�
-8����0��HLJ��q�a�Z[^��RI�^֌}&��	�:������e>      7   *  x�%�Q�� C��ìJ���e���3�JN��G�vV��+gL�W,:�c���z�<q|~�������OT���(�SC��w�v�9_�uQ�@��^�(�>�(q�#!%�Rb��\dJ��%1l�F�{��� �؋cb��H�7}��[4{���M�q�b�y���ŲG��=bo�#c�Hw�e�\�#��с�K<:,���G�6�Fef�<ra�ܳG޳G��>��Q�=b��<j�����$��=yn��4�q��<7����Σ+'�_���ө:��w�^      4      x��M�  �3����˱���<��6[b����ؤ_��$�9���>���sr�
D�E'�N�JKX����i���ʚ���y2�̽[�v^�jǍ��Wc�Su)�(`!sz��?�#�      9      x������ � �     