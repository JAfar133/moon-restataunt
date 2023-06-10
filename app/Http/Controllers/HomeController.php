<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $menuItems;
    public function __construct()
    {
//        $this->middleware('auth');
        $this->menuItems = array(
            //Салаты
            11=>new MenuItem(11,"salads", "Цезарь с курицей", "220г", 650),
            12=>new MenuItem(12,"salads", "Цезарь с Креветками", "220г", 710),
            13=>new MenuItem(13,"salads", "Бора-Бора", "180г", 750),
            14=>new MenuItem(14,"salads", "Микс салата с утиной грудкой, мандарином и соусом хойсин", "220г", 650),
            15=>new MenuItem(15,"salads", "Салат с хрустящим ципленком", "200г", 560),
            16=>new MenuItem(16,"salads", "Тайский салат из баклажан", "250г", 550),
            //Закуски
            21=>new MenuItem(21,"snacks", "Мясное ассорти", "225г", 1100),
            22=>new MenuItem(22,"snacks", "Сырная тарелка", "240г", 800),
            23=>new MenuItem(23,"snacks", "Начос с гуакамоле", "250г", 450),
            24=>new MenuItem(24,"snacks", "Кесадилья с курицей-говядиной", "400г", 560),
            25=>new MenuItem(25,"snacks", "Креветки темпура", "180г", 620),
            26=>new MenuItem(26,"snacks", "Утиная грудка с облепихой", "170г", 950),
            27=>new MenuItem(27,"snacks", "Утиная грудка по пекински", "180г", 900),
            //Паста
            31=>new MenuItem(31,"pasta", "Паста Карбонара", "350г", 650),
            32=>new MenuItem(32,"pasta", "Паста Бальоньезе", "350г", 680),
            33=>new MenuItem(33,"pasta", "Черные спаггетти с морепродуктами", "370г", 750),
            //Мангал
            41=>new MenuItem(41,"barbecue", "Шашлык из курицы", "240г", 550),
            42=>new MenuItem(42,"barbecue", "Шашлык из баранины", "230г", 760),
            43=>new MenuItem(43,"barbecue", "Шашлык из телятины", "220г", 780),
            44=>new MenuItem(44,"barbecue", "Дорадо", "350г", 750),
            45=>new MenuItem(45,"barbecue", "Сибас", "350г", 750),
            //Роллы
            51=>new MenuItem(51,"rolls", "Роллы Калифорния", "220/8шт", 680),
            52=>new MenuItem(52,"rolls", "Роллы Филадельфия", "220/8шт", 650),
            53=>new MenuItem(53,"rolls", "Роллы Кешидзу", "220/8шт", 750),
            //Супы
            61=>new MenuItem(61,"soups", "Мисо суп с лососем и гречневой лапшой", "550г", 670),
            62=>new MenuItem(62,"soups", "Мисо суп с угрем и пшеничной лапшой", "550г", 700),
            //Бургеры
            71=>new MenuItem(71,"burgers", "MOON Бургер", "380г", 580),
            72=>new MenuItem(72,"burgers", "Классик Бургер", "380г", 570),
            //Пицца
            81=>new MenuItem(81,"pizza", "Цезарь", "550г", 700),
            82=>new MenuItem(82,"pizza", "Мясной пир", "550г", 750),
            83=>new MenuItem(83,"pizza", "Четыре сыра", "550г", 650),
            84=>new MenuItem(84,"pizza", "Пепперони", "450г", 720),
            //Горячие блюда
            91=>new MenuItem(91,"hot", "Куриные шашлычки том ям", "380г", 640),
            92=>new MenuItem(92,"hot", "Тальята с микс салатом и перечным соусом", "170г", 1100),
//            93=>new MenuItem(93,"hot", "Медальоны из говяжьей вырезки с мини картофелем и грибным соусом", "120/50/100г", 970),
            94=>new MenuItem(94,"hot", "Стейк Нью-Йорк с овощами гриль", "270г", 1200),
            95=>new MenuItem(95,"hot", "Радужная форель с овощным жульеном", "330г", 900),
            //Десерты
            101=>new MenuItem(101,"desserts", "Чизкейк", "", 360),
            102=>new MenuItem(102,"desserts", "Медовик", "", 350),
            103=>new MenuItem(103,"desserts", "Тирамису", "", 350),
            104=>new MenuItem(104,"desserts", "Манго-маракуя", "", 380),
            //Хачапури
            111=>new MenuItem(111,"khachapuri", "Хачапури по-аджарски", "400г", 550),
            112=>new MenuItem(112,"khachapuri", "Хачапури по-мегрельски", "400г", 580),

        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $images = Image::query()->orderByDesc('id')->paginate(15);
        $menus = Menu::query()->get();

        $dataImages = [
            'images' => $images->items(),
             'menus' => $menus,
//            'data' => $images
        ];

        return view('index', $dataImages);
    }

    public function menu()
    {
        return view('pages.menu.our-menu');
    }
    public function menuItems($uri)
    {
        if($uri==="basket"){
            return view('pages.menu.basket');
        }
        else {
            return view('pages.menu.menuItems', [
                'url' => $uri,
                'menuItems' => array_filter($this->menuItems, function($item) use ($uri) {
                    return $item->category === $uri;
                })
            ]);
        }
    }
    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Карзина очищена!');
    }
    public function removeItem($id)
    {
        $cart = session('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        $count = count($cart);
        $total = array_reduce($cart, function($carry, $item) {
            return $carry + $item['quantity'] * $item['price'];
        }, 0);
        return response()->json(['count' => $count, 'total' => $total]);

    }
    public function updateQuantity(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $quantity = $request->input('quantity');
            $cart[$id]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }

        $count = count($cart);
        $total = $this->getCartTotal($cart);
        $itemTotal = $cart[$id]['quantity'] * $cart[$id]['price'];

        return response()->json([
            'count' => $count,
            'total' => $total,
            'quantity' => $cart[$id]['quantity'],
            'item_total' => $itemTotal,
        ]);
    }
    private function getCartTotal($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['quantity'] * $item['price'];
        }
        return $total;
    }


    public function addItem(Request $request)
    {
        $itemId = $request->input('item_id');
        $item = $this->menuItems[$itemId];
        $cart = session()->get('cart', []);

        if (isset($cart[$itemId])) {
            $cart[$itemId]['quantity']++;
        } else {
            $cart[$itemId] = [
                'name' => $item->name,
                'quantity' => 1,
                'price' => $item->price,
                'category' => $item->category
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'message' => 'Блюдо успешно добавлено в вашу корзину!',
            'count' => count($cart)
        ]);

    }


    public function gallery()
    {
        $images = Image::query()->paginate(15);

        return view('layouts.pages.gallery.index', [
            'images' => $images->items(),
            'data' => $images
        ]);
    }

    public function about()
    {
        return view('layouts.pages.about.index');
    }

    public function uploadMenu(Request $request)
    {
        $request->validate([
           'pdf-menu' => 'required|mimes:pdf|max:4096'
        ]);

        $pdf = $request->file('pdf-menu');
        $pdf->storeAs('menu-pdf', 'menu.pdf', 'local');

        return $this->showMenu();
    }

    public function showMenu()
    {
        $url = url(route('filament.pages.upload-menu'));
        return redirect()->intended($url);
    }
}
