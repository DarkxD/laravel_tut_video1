A projektet laravel tanulása céljából kezdtem el készíteni egy youtube on fellelhető tutorial videó alapján.

webmania gyorstalpaló videója: https://youtu.be/ApIbkBLV_yc?si=LMfa-iGhPNcVBl11
validate video: https://www.youtube.com/watch?v=cR10ZT1MJR4

Projekt kezdete: 2024.07.02.

1. nap - Előkészítés

.env -> mysql beállítása
Migrations elkészítése: categories, tags, aitools
Modellek elkészítése: Aitool, Category
Controllerek elkészítése: AitoolsController, CategoriesController
Views > aitools (index, show, create, edit)
Views > categories (index, show, create, edit)
Views (layout)
Routes > web.php
public > style.css + logo
https://youtu.be/ApIbkBLV_yc?si=LMfa-iGhPNcVBl11&t=4320
github repo építése

2. nap - Hibajavítás, videó befejezése (bootstrap alapozás)

migrate javítások: hasFeePlan->hasFreePlan, string típúsról bool típúsra, price decimal(5,2) növelése (50,2) méretre
Tagek, címkék létrehozása, kezelése. Tagek hozzácsatolása az aitools-hoz. aitools létrehozásánál hozzá lehet adni tag-eket. belongstomany modell, timestamp nélküli kapcsolótábla.

AI eszközök sorbarendezése név szerint
php artisan make:migration add_index_to_aitools_name --table=aitools // aitools index hozzáadása
<a href="{{ route('aitools.index', ['sort_by' => 'name', 'sort_dir' => 'asc']) }}" title="ABC">▼</a>
<a href="{{ route('aitools.index', ['sort_by' => 'name', 'sort_dir' => 'desc']) }}" title="ZYX">▲</a>

aitools_table bool javítása boolean ra

Lapozó kialakítása
->paginate(5);
 {{ $aitools->appends(['sort_by' => request('sort_by'), 'sort_dir' => request('sort_dir')])-> links() }} {{-- Lehozza az url ből a rendezést --}}

Projekt befejezése: 
