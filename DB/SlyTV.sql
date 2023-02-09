PGDMP                 	        {            SlyTV    15.1    15.1 "               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    17657    SlyTV    DATABASE     {   CREATE DATABASE "SlyTV" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'German_Germany.1252';
    DROP DATABASE "SlyTV";
                postgres    false            �            1259    17729    Movies    TABLE     �   CREATE TABLE public."Movies" (
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
       public         heap    postgres    false            �            1259    17734    Movies_ID_seq    SEQUENCE     �   CREATE SEQUENCE public."Movies_ID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public."Movies_ID_seq";
       public          postgres    false    214                       0    0    Movies_ID_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public."Movies_ID_seq" OWNED BY public."Movies".id;
          public          postgres    false    215            �            1259    17735    Users    TABLE     �   CREATE TABLE public."Users" (
    user_id bigint NOT NULL,
    username character varying NOT NULL,
    email character varying NOT NULL,
    password character varying NOT NULL
);
    DROP TABLE public."Users";
       public         heap    postgres    false            �            1259    17740    Users_userID_seq    SEQUENCE     {   CREATE SEQUENCE public."Users_userID_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public."Users_userID_seq";
       public          postgres    false    216                       0    0    Users_userID_seq    SEQUENCE OWNED BY     J   ALTER SEQUENCE public."Users_userID_seq" OWNED BY public."Users".user_id;
          public          postgres    false    217            �            1259    17741    movie_comments    TABLE     �   CREATE TABLE public.movie_comments (
    id integer NOT NULL,
    movie_id integer NOT NULL,
    user_id integer NOT NULL,
    comment text NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);
 "   DROP TABLE public.movie_comments;
       public         heap    postgres    false            �            1259    17747    movie_comments_id_seq    SEQUENCE     �   CREATE SEQUENCE public.movie_comments_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.movie_comments_id_seq;
       public          postgres    false    218                        0    0    movie_comments_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.movie_comments_id_seq OWNED BY public.movie_comments.id;
          public          postgres    false    219            �            1259    17748    movie_ratings    TABLE     �   CREATE TABLE public.movie_ratings (
    id integer NOT NULL,
    movie_id integer NOT NULL,
    user_id integer NOT NULL,
    rating integer,
    CONSTRAINT movie_ratings_rating_check CHECK (((rating >= 1) AND (rating <= 5)))
);
 !   DROP TABLE public.movie_ratings;
       public         heap    postgres    false            �            1259    17752    movie_ratings_id_seq    SEQUENCE     �   CREATE SEQUENCE public.movie_ratings_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.movie_ratings_id_seq;
       public          postgres    false    220            !           0    0    movie_ratings_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.movie_ratings_id_seq OWNED BY public.movie_ratings.id;
          public          postgres    false    221            �            1259    17753    pwdReset    TABLE     �   CREATE TABLE public."pwdReset" (
    id integer NOT NULL,
    email character varying,
    selector character varying,
    token character varying,
    expires integer
);
    DROP TABLE public."pwdReset";
       public         heap    postgres    false            �            1259    17758    pwdReset_id_seq    SEQUENCE     �   CREATE SEQUENCE public."pwdReset_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public."pwdReset_id_seq";
       public          postgres    false    222            "           0    0    pwdReset_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public."pwdReset_id_seq" OWNED BY public."pwdReset".id;
          public          postgres    false    223            y           2604    17759 	   Movies id    DEFAULT     j   ALTER TABLE ONLY public."Movies" ALTER COLUMN id SET DEFAULT nextval('public."Movies_ID_seq"'::regclass);
 :   ALTER TABLE public."Movies" ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    215    214            z           2604    17760    Users user_id    DEFAULT     q   ALTER TABLE ONLY public."Users" ALTER COLUMN user_id SET DEFAULT nextval('public."Users_userID_seq"'::regclass);
 >   ALTER TABLE public."Users" ALTER COLUMN user_id DROP DEFAULT;
       public          postgres    false    217    216            {           2604    17761    movie_comments id    DEFAULT     v   ALTER TABLE ONLY public.movie_comments ALTER COLUMN id SET DEFAULT nextval('public.movie_comments_id_seq'::regclass);
 @   ALTER TABLE public.movie_comments ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    219    218            }           2604    17762    movie_ratings id    DEFAULT     t   ALTER TABLE ONLY public.movie_ratings ALTER COLUMN id SET DEFAULT nextval('public.movie_ratings_id_seq'::regclass);
 ?   ALTER TABLE public.movie_ratings ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    221    220            ~           2604    17763    pwdReset id    DEFAULT     n   ALTER TABLE ONLY public."pwdReset" ALTER COLUMN id SET DEFAULT nextval('public."pwdReset_id_seq"'::regclass);
 <   ALTER TABLE public."pwdReset" ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    223    222                      0    17729    Movies 
   TABLE DATA           b   COPY public."Movies" (id, title, genre, publishingyear, plot, image, actors, user_id) FROM stdin;
    public          postgres    false    214   -$                 0    17735    Users 
   TABLE DATA           E   COPY public."Users" (user_id, username, email, password) FROM stdin;
    public          postgres    false    216   �,                 0    17741    movie_comments 
   TABLE DATA           T   COPY public.movie_comments (id, movie_id, user_id, comment, created_at) FROM stdin;
    public          postgres    false    218   p1                 0    17748    movie_ratings 
   TABLE DATA           F   COPY public.movie_ratings (id, movie_id, user_id, rating) FROM stdin;
    public          postgres    false    220   �6                 0    17753    pwdReset 
   TABLE DATA           I   COPY public."pwdReset" (id, email, selector, token, expires) FROM stdin;
    public          postgres    false    222   �7       #           0    0    Movies_ID_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public."Movies_ID_seq"', 1, false);
          public          postgres    false    215            $           0    0    Users_userID_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public."Users_userID_seq"', 21, true);
          public          postgres    false    217            %           0    0    movie_comments_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.movie_comments_id_seq', 394, true);
          public          postgres    false    219            &           0    0    movie_ratings_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.movie_ratings_id_seq', 36, true);
          public          postgres    false    221            '           0    0    pwdReset_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public."pwdReset_id_seq"', 8, true);
          public          postgres    false    223               �  x�uW�v��]S_Q;oH�hlg�%E�F[!��s|�)E���n��A
^��?��:�?��V�,;��`?�n�{��y�T���θj�p��������}7Y�`\!d"m|pd-��<�Tw�����{�
+�.8�'�(�w�n��	%�ߦ:x'�aYk}�t0�οս8��rg�͡�C����8�q�dm��no��m�1��f�,?~m��'����KA�)�r#�.9X�E@o$H��ć�9��螝L�28��y#���?�E��ѻɧӓ&O&�3�d�F�o@~�Q�⒈���a�mILL��h��ƌ��ˀd�����NXN��ʌ��^�`|�P��l�IJZ���9��̏Ae��;l�ta����)�a=#	+iJ�8���s����������E�2��0�k�aZ�a��_� ���V�ʦɺ0�%ۚ"�k���|�x����Ȗ����A�C��5�-]US���� ��b�P�$E���U��0�������Nw��]�(�)��`$c� c����[��0����L a|���k�Env/{� ���l�>�{�žG����7t����Z��V���Xk�Cں�����R�LQ�XZ2��+|{�~�0��xh[�Z�L��_ib˩���c��kT��?6��5��"I����L[o�?%��uVg<
�q��>���c+��y}��c��57����*hJ?{�-��R�|���,�W(�	�K�e5 I
YSu��i���3�2M���M4�~�h�jw��*��4�p�}�!kZM���� h��@�`0ҴI�� 3�`&��D������߅�Ι�%؆;�_8�F����Q��5�
(�j@ ������ۭu6=�.��x�){���9S�i2���S�:	ʙ&������v��V��n�N��j�{_䒃�>*utM+�S��="o��m�-W�.2�BMSVeJhF���N�Q���/�E��F�(^E]�4⍱�V�jJ(�W�l
�_���f�����
�-Tx�+j��2�k��|�,vu��k=�dK��w�ãN�
"�9�;��C<b�(��Q~8���S�4A�n�+U9=��Q���*�!�P�Ҙ~.]eލp�ƈ:��%9����;k��!�����p��v1jo�HH�w4������܎VR*O���i�OO��ǡ��\� ��Z#4��\��P_�.��75��rE���C���o�)�ҡ�`%�R@~�P���fo��D�L��l�v������]w.;�s���QZ�d	��^{�!W����/�#ѿ&�`����y@�+�����6G�VTF�MT��O�w�q��'o��,�p`�:.�1!]	b�")���kH�p΃:2H�=�0�G�%k�ǂ��C��Ht�X��.c�K�	�p_��0����p����w�M����hGA���B����\<�6����#�y֨�#?����f?� )�ܤWQ�8@3Ēq�vx����+4<F6���B02ˮ��U7]�s�0�%n�R����5��'��mqƐ�{F�pX�C~G�A��b��Ƌ�	�P������h���hHm�R�4����0�G;��p�|�� 7J�MA��l�3Ñ+����m��M{���%�.���0=�]�B���Gs���1�*�
&W>u��i'�&�=������(;�PX���r��ë���K��A"L��.�k�T΀U��Z�_�m�������׿��d�+���2`��"�k5�c�k���
�*y�(|�A���c:3Mg��<l��`�8�9hK-~m��k0m`�2b����ws�����)�U_+�l��<ZO�Q��G���� E8���4�����f����{n6qr��n��-�)����_���_怦�t�n�60N �6�sI�Z?�΢��b�V3
p_}��1�
`:�N�Ä�Ր0��qW��c'o�+�Q�c3��%���<F���d��*�hR�]O7��eC_S�56��O�X�g3l��3���� x�j�>Ko}�۷�{��W0B�y�����F�e��wl�v�p�����q�-K��g�n������\n:��~���G�ߠ+�v_�������&���qۅ�p�p*�P�C�Ǔ��ONN��c�         �  x�uTَ�F}���F�����fef���l���L��b���A> ����I�g�@�K!�=�ܪ�":(rI��1s�����T��$>���̢a0[s1\����v��nkL�K�V�43�3���Sjˋ�3吕�7 5@*!�#"��A>����r�v1�{�j9�L��4R��s�(O���:��"Ŝ(덕^l"0Qъ0A�"�������Ⱦ��m���o�<�<��J��ь��準u���s
�LN�=Y�(���ӑ��a��T#�|$~˾����U�3��D�״�F��x��B�id�G�K�W ����~a'�$���6߽����Lz����po1�9f&�W���)QmUkp����}�I��P�D`� �����-�ʒ��2��U�����z�{)�����+ϱ�8\�==�����K�D�)�r$����{��Z[���Ұ��c�B�}��x#(�^��^R��и�ljL'���=�(�(��@U���/���X=gmծd����������UCK� �JwX׈;�]��J��$��X���q����� ����K�U1e3��������ad��][�݄_8qy�Pr��o6�{O,<���Ӕx:a)c��	�8��Xb6�ZG1�_��LPg�rDIsdc?w�z/�?�������uQ��_,���lg���;�������ݡ��T��>��DqӴ 	_�m��D$:�ٮ;�e�q�S\��f�I��v^�Ö��nIoY���h�$;����_���G�� ��K¥��' r��ꠕnM�k
����y8R���˓���ͩ,JrH�&0�/��~7��{�C�~=;����"`�S�X�&�Wj�T,˙��Z|=	���njg,����I��gۏ��Է���Z\f��ǽĞI R	5Xy�sJ!ZM9º�uq�ǫ%���O ~����~-�����/�q�py���������*�c��a�*W�������s[�yպNc�6_�{%)�(E<_�( �0*򇧧z|��g�!���ˇ6�AT�/Fm������q����G�>h�*��{�Z���ݕ�Z�Z0Wl�[y��-��t�8�ÐH�$U��R�ؤ���/�Yw���BM鲟MN��&X�.��"�ԙ7��q�A֗4j�T^ƢO��� G�9-         9  x��Ms�6����@N=��� A�ri'3���^ r-"!�%���P�8N2�Ii���o����,>Ŋ,	�f$�; '=���ݿKe��f�$��d^1�JA����fw�`�e�2��3�ɝ�!�r�_�s��8:]{1�>Nv�Z���>��kH��� ��{�1�HtQ��Oz=zjX�ȱeL�6z��~Ї�<'�'k1�E�.Ym0��Zh�3�L����B���28�9��џɣ>��s��=FDg�Ò����Ǹ��Fw��hc����X9C��^�.6���u����%�\H�٘4��f:���S�:�5�r\��u�Ic@�EDﵱ�>}���O5@��'����8;.:剈]	��z7<�zp�.��*P<����0��	���-�a9�łtzڷ��<���`u�0`��.gQ�}Z�o�81K�/���/}����¶�����3�؊8_N�Yn�2K�sW�y�)Y�Pw��v��Ƣ�.;G3N��է���I���D���8���e.�:w��������ТI��1A|3�*���\�̜�`q̜�}r%fNY�o��iX�Vb�T�0s*��:̜�A�s,��Y��j�eRlƜ����H��ZM
uj#�,l�W!��D�&���N��]~��T�s�Wbf4�7afY��f��k13���1�x[˙ɨ�h�G�����ކZE���.��Z؜�V�<�����
y3ڜG���y�l��e��m��iǳ�f�q�]M;��7�-⺱���}�����]����j-m��[i�x�\K[ě��h��j��T��v<2\���{�Z�2�q[��*K.����*�"��ioD���WQq��9��"F��[$z���e��|�:�*�SUd����U8�f���5ߑ0ZQYq��LP9�;��a�~G-x��"�j~yw����K�{s��*H&+�+�R��s)�*�,�����'�0N=i\�2����=������C��wb�3~��VoHctO��Sxj3C�){�hb��4��$<b�B�� 6��j�;��tF��wt�t�N�{O�08nj]����ɧi�4��X�������>%1hRc��|�cC���� ������Ϧ���Q��O�ǹ��Z���)�J��L�K9��rn(��2��湚�g57U��TrEs>�3�Y�M�<��S��,�W�|n��4+�s����;9���и���u�n����w_�����iQfB��[I�K���B~3]�B"���$KU��Β�����N�ᇝ�?�x�T�Q�ł�� EGN���᣷
�-&�T��,v�_���ݿ~v	>         *  x�-�[!��0)A�ݻ���=�����eaѿ�i���iS���˖��v�;:?���ګs�o���P�蒩�袷nP&I8F�V�n�$��3;/G7�N��R��Uf��Rݘ�\4�oӘ�yh,��1�� ��mbZ�	��L��[.Ҥ@�Х��Qb�Wb'��.M����!�C� �q-�q-�H!����e�]>�+O���ޭ|kJ��;����ӑz�3���A�F,����a�gW�����go��ຖ֣x��;0Y�`/� N�n���b\kk	�����wX����0I�~���_R           x�E�Mo�0 ��s��K�7�Dac�ŉ٥��(�����e[�ޟ�X5ؾ��Ū�qZXu��>Y���F�sO�j0!��I��˸<gs7~,�nӪt�����T0X��yz��K/��{����#�B2̅��� ��Oӻ�7�g�3��,�)F~12�*�aC��n�zИ$�z7��_1�sC>�.Q�FUyR	|�����:���O�KzJsd�9��cOMK[ȃu�ϛ/j�ühw	�.-,I컮�	����]�H�-.0�	s>��87��c�     