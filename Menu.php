<?php
$menu = [
    "T1" => [
        "name" => "Classic Tapsilog", 
        "price" => 120, 
        "img" => "https://www.bonappetit.com/recipe/tapsilog",
        "desc" => "Ang paboritong Beef Tapa na may saktong alat at tamis, served with garlic rice at fried egg."
    ],
    "T2" => [
        "name" => "Sweet Tocilog", 
        "price" => 110, 
        "img" => "https://purposefoods.ph/products/pork-tocilog",
        "desc" => "Malambot at manamis-namis na Pork Tocino. Perfect pampagana sa umaga!"
    ],
    "T3" => [
        "name" => "Garlic Longsilog", 
        "price" => 100, 
        "img" => "https://www.tasteatlas.com/longsilog",
        "desc" => "Authentic garlic longganisa. Malinamnam at siksik sa lasa."
    ],
    "T4" => [
        "name" => "Crispy Bangsilog", 
        "price" => 130, 
        "img" => "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=400&h=300&fit=crop",
        "desc" => "Daing na Bangus na pinirito hanggang maging crispy. Served with vinegar dip."
    ],
    "T5" => [
        "name" => "Fried Chicksilog", 
        "price" => 115, 
        "img" => "https://images.unsplash.com/photo-1562967914-608f82629710?q=80&w=400&h=300&fit=crop",
        "desc" => "Juicy fried chicken leg quarter na may malutong na balat."
    ]
];

$orderSummary = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service = $_POST['service'];
    $itemCode = $_POST['item_code'];
    $quantity = (int)$_POST['quantity'];

    if (isset($menu[$itemCode]) && $quantity > 0) {
        $itemName = $menu[$itemCode]['name'];
        $totalPrice = $menu[$itemCode]['price'] * $quantity;
        $orderSummary = "
            <div class='receipt-container bounce-in'>
                <h3>Order Placed!</h3>
                <p>Item: $itemName | Qty: $quantity</p>
                <div class='total'>Total: ₱" . number_format($totalPrice, 2) . "</div>
            </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Silog Express | Interactive Menu</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --accent: #ff7e5f; --gradient: linear-gradient(135deg, #ff7e5f 0%, #feb47b 100%); --dark: #2d3436; }
        body { font-family: 'Poppins', sans-serif; background: #f0f2f5; margin: 0; padding: 0; }
        .header { background: var(--gradient); padding: 40px 20px; color: white; text-align: center; border-radius: 0 0 30px 30px; }
        .container { max-width: 800px; margin: -30px auto 50px; padding: 0 20px; }
        
        .menu-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; margin-bottom: 30px; }
        .food-card { background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); transition: 0.3s; cursor: pointer; }
        .food-card:hover { transform: translateY(-5px); }
        .food-card img { width: 100%; height: 160px; object-fit: cover; }
        .food-info { padding: 15px; }
        .food-info h4 { margin: 0; font-size: 1rem; color: var(--dark); }
        .price { color: var(--accent); font-weight: 700; margin-top: 5px; }

        /* MODAL STYLES */
        .modal { display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); backdrop-filter: blur(5px); }
        .modal-content { background: white; margin: 10% auto; padding: 25px; width: 80%; max-width: 400px; border-radius: 20px; text-align: center; position: relative; animation: slideDown 0.3s ease-out; }
        @keyframes slideDown { from { transform: translateY(-50px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        .close-btn { position: absolute; right: 20px; top: 15px; font-size: 24px; cursor: pointer; color: #aaa; }
        .modal-img { width: 100%; height: 200px; object-fit: cover; border-radius: 15px; margin-bottom: 15px; }
        
        .order-card { background: white; padding: 30px; border-radius: 25px; box-shadow: 0 15px 35px rgba(0,0,0,0.05); }
        .input-group { margin-bottom: 15px; }
        select, input { width: 100%; padding: 12px; border: 2px solid #edf2f7; border-radius: 10px; box-sizing: border-box; }
        .btn-order { background: var(--gradient); color: white; border: none; padding: 15px; width: 100%; border-radius: 12px; font-weight: 700; cursor: pointer; }
        .receipt-container { margin-top: 20px; background: var(--dark); color: white; padding: 20px; border-radius: 15px; }
    </style>
</head>
<body>

    <div class="header">
        <h1>🍳 Silog Express</h1>
        <p>Click the food for more details!</p>
    </div>

    <div class="container">
        <div class="menu-grid">
            <?php foreach ($menu as $code => $item): ?>
            <!-- Dinagdagan ng onclick function -->
            <div class="food-card" onclick="showDetails('<?= $item['name'] ?>', '<?= $item['desc'] ?>', '<?= $item['img'] ?>', '<?= $item['price'] ?>')">
                <img src="<?= $item['img'] ?>" alt="<?= $item['name'] ?>" onerror="this.src='https://via.placeholder.com/300x200'">
                <div class="food-info">
                    <h4><?= $item['name'] ?></h4>
                    <p class="price">₱<?= $item['price'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- ORDER FORM -->
        <div class="order-card">
            <form method="POST">
                <div class="input-group">
                    <label>Module / Service</label>
                    <select name="service">
                        <option value="Dine-in">Dine-in</option>
                        <option value="Take-out">Take-out</option>
                    </select>
                </div>
                <div class="input-group">
                    <label>Select Order</label>
                    <select name="item_code">
                        <?php foreach ($menu as $code => $item): ?>
                            <option value="<?= $code ?>"><?= $item['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" min="1" value="1">
                </div>
                <button type="submit" class="btn-order">PLACE ORDER</button>
            </form>
        </div>

        <?= $orderSummary ?>
    </div>

    <!-- MODAL STRUCTURE -->
    <div id="foodModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <img id="m-img" class="modal-img" src="">
            <h2 id="m-name" style="margin: 0 0 10px 0;"></h2>
            <p id="m-desc" style="color: #636e72; font-size: 0.9rem; line-height: 1.5;"></p>
            <h3 id="m-price" style="color: var(--accent);"></h3>
        </div>
    </div>

    <script>
        function showDetails(name, desc, img, price) {
            document.getElementById('m-name').innerText = name;
            document.getElementById('m-desc').innerText = desc;
            document.getElementById('m-img').src = img;
            document.getElementById('m-price').innerText = "₱" + price;
            document.getElementById('foodModal').style.display = "block";
        }

        function closeModal() {
            document.getElementById('foodModal').style.display = "none";
        }

        // Close modal if clicked outside the content
        window.onclick = function(event) {
            let modal = document.getElementById('foodModal');
            if (event.target == modal) { modal.style.display = "none"; }
        }
    </script>

<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>