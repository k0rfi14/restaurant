<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silog Express | Interactive Menu</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --accent: #ff7e5f; --gradient: linear-gradient(135deg, #ff7e5f 0%, #feb47b 100%); --dark: #2d3436; }
        body { font-family: 'Poppins', sans-serif; background: #f0f2f5; margin: 0; padding: 0; color: var(--dark); }
        .header { background: var(--gradient); padding: 40px 20px; color: white; text-align: center; border-radius: 0 0 30px 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .container { max-width: 850px; margin: -30px auto 50px; padding: 0 20px; }
        
        /* Menu Grid */
        .menu-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; margin-bottom: 30px; }
        .food-card { background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); transition: 0.3s; cursor: pointer; border: 1px solid transparent; }
        .food-card:hover { transform: translateY(-5px); border-color: var(--accent); box-shadow: 0 15px 30px rgba(255,126,95,0.15); }
        .food-card img { width: 100%; height: 160px; object-fit: cover; }
        .food-info { padding: 15px; }
        .food-info h4 { margin: 0; font-size: 1rem; }
        .price-tag { color: var(--accent); font-weight: 700; font-size: 1.1rem; margin-top: 5px; }

        /* Modal */
        .modal { display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); backdrop-filter: blur(8px); }
        .modal-content { background: white; margin: 10% auto; padding: 0; width: 90%; max-width: 400px; border-radius: 25px; overflow: hidden; position: relative; animation: popUp 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
        @keyframes popUp { from { transform: scale(0.8); opacity: 0; } to { transform: scale(1); opacity: 1; } }
        .close-btn { position: absolute; right: 15px; top: 10px; font-size: 28px; cursor: pointer; color: white; text-shadow: 0 2px 5px rgba(0,0,0,0.5); z-index: 10; }
        .modal-img { width: 100%; height: 250px; object-fit: cover; }
        .modal-text { padding: 25px; text-align: center; }

        /* Form */
        .order-card { background: white; padding: 30px; border-radius: 25px; box-shadow: 0 15px 35px rgba(0,0,0,0.05); }
        .input-group { margin-bottom: 20px; }
        label { display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px; color: #636e72; }
        select, input { width: 100%; padding: 14px; border: 2px solid #edf2f7; border-radius: 12px; font-family: inherit; font-size: 0.95rem; box-sizing: border-box; }
        .btn-order { background: var(--gradient); color: white; border: none; padding: 16px; width: 100%; border-radius: 15px; font-size: 1.1rem; font-weight: 700; cursor: pointer; transition: 0.3s; box-shadow: 0 8px 15px rgba(255,126,95,0.2); }
        .btn-order:hover { transform: scale(1.02); filter: brightness(1.1); }

        /* Receipt */
        #receiptSection { display: none; margin-top: 30px; background: var(--dark); color: white; border-radius: 20px; padding: 25px; text-align: center; }
        .bounce-in { animation: bounceIn 0.5s ease; }
        @keyframes bounceIn { 0% { transform: scale(0.5); opacity: 0; } 100% { transform: scale(1); opacity: 1; } }
    </style>
</head>
<body>

    <div class="header">
        <h1>🍳 Silog Express</h1>
        <p>Premium Filipino Breakfast Menu</p>
    </div>

    <div class="container">
        <h3 style="margin: 40px 0 20px;">Our Specials (Click for details)</h3>
        
        <div class="menu-grid" id="menuGrid"></div>

        <div class="order-card">
            <h3 style="margin-top:0">Place Your Order</h3>
            <form id="orderForm">
                <div class="input-group">
                    <label>How will you eat?</label>
                    <select id="service">
                        <option value="Dine-in">🍽 Dine-in</option>
                        <option value="Take-out">🥡 Take-out</option>
                        <option value="Delivery">🛵 Delivery</option>
                    </select>
                </div>

                <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                    <div class="input-group" style="flex: 2; min-width: 200px;">
                        <label>Select Silog</label>
                        <select id="itemCode"></select>
                    </div>
                    <div class="input-group" style="flex: 1; min-width: 100px;">
                        <label>Quantity</label>
                        <input type="number" id="quantity" min="1" value="1">
                    </div>
                </div>

                <button type="submit" class="btn-order">CHECKOUT NOW</button>
            </form>
        </div>

        <div id="receiptSection" class="bounce-in"></div>
    </div>

    <div id="foodModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <img id="modal-img" class="modal-img" src="">
            <div class="modal-text">
                <h2 id="modal-name" style="margin: 0 0 10px 0;"></h2>
                <p id="modal-desc" style="color: #636e72; font-size: 0.95rem; line-height: 1.6;"></p>
                <h3 id="modal-price" style="color: var(--accent); margin-top: 15px;"></h3>
            </div>
        </div>
    </div>

    <script>
        // Data na dating nasa PHP, nasa JavaScript Object na ngayon
        const menuData = {
            "T1": { name: "Classic Tapsilog", price: 120, img: "tapsilog.jpg", desc: "Ang paboritong Beef Tapa na may saktong alat at tamis." }, //
            "T2": { name: "Sweet Tocilog", price: 110, img: "tosilog.jpg", desc: "Malambot at manamis-namis na Pork Tocino." }, //
            "T3": { name: "Garlic Longsilog", price: 100, img: "longsilog.jpg", desc: "Authentic garlic longganisa. Malinamnam at siksik sa lasa." }, //
            "T4": { name: "Crispy Bangsilog", price: 130, img: "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=400&h=300&fit=crop", desc: "Daing na Bangus na pinirito hanggang maging crispy." },
            "T5": { name: "Fried Chicksilog", price: 115, img: "https://images.unsplash.com/photo-1562967914-608f82629710?q=80&w=400&h=300&fit=crop", desc: "Juicy fried chicken leg quarter na may malutong na balat." }
        };

        // Render Menu Cards and Select Options
        const menuGrid = document.getElementById('menuGrid');
        const itemSelect = document.getElementById('itemCode');

        Object.keys(menuData).forEach(code => {
            const item = menuData[code];

            // Add to Grid
            const card = document.createElement('div');
            card.className = 'food-card';
            card.onclick = () => openDetails(item.name, item.desc, item.img, item.price);
            card.innerHTML = `
                <img src="${item.img}" alt="${item.name}" onerror="this.src='https://via.placeholder.com/300x200?text=Food+Photo'">
                <div class="food-info">
                    <h4>${item.name}</h4>
                    <div class="price-tag">₱${item.price}</div>
                </div>
            `;
            menuGrid.appendChild(card);

            // Add to Dropdown
            const option = document.createElement('option');
            option.value = code;
            option.innerText = `${item.name} - ₱${item.price}`;
            itemSelect.appendChild(option);
        });

        // Modal Functions
        function openDetails(name, desc, img, price) {
            document.getElementById('modal-name').innerText = name;
            document.getElementById('modal-desc').innerText = desc;
            document.getElementById('modal-img').src = img;
            document.getElementById('modal-price').innerText = "₱" + price;
            document.getElementById('foodModal').style.display = "block";
        }

        function closeModal() {
            document.getElementById('foodModal').style.display = "none";
        }

        // Order Handling
        document.getElementById('orderForm').onsubmit = function(e) {
            e.preventDefault();
            const service = document.getElementById('service').value;
            const code = document.getElementById('itemCode').value;
            const qty = document.getElementById('quantity').value;
            const item = menuData[code];
            const total = item.price * qty;

            const receipt = document.getElementById('receiptSection');
            receipt.style.display = "block";
            receipt.innerHTML = `
                <h3 style='margin-top:0; color:#feb47b;'>Order Confirmed!</h3>
                <p>Service: <strong>${service}</strong></p>
                <p>Item: <strong>${item.name}</strong></p>
                <p>Qty: <strong>${qty}</strong></p>
                <div style='font-size:1.5rem; margin-top:10px; border-top:1px dashed #555; padding-top:10px;'>
                    Total: ₱${total.toLocaleString(undefined, {minimumFractionDigits: 2})}
                </div>
            `;
            window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
        };

        window.onclick = (e) => { if (e.target == document.getElementById('foodModal')) closeModal(); }
    </script>
</body>
</html>
