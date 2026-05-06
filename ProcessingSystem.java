import java.util.ArrayList;
import java.util.Scanner;

// Menu Item Class
class MenuItem {
    String code;
    String name;
    double price;

    MenuItem(String code, String name, double price) {
        this.code = code;
        this.name = name;
        this.price = price;
    }
}

// Order Class
class Order {
    MenuItem item;
    int quantity;
    double total;

    Order(MenuItem item, int quantity) {
        this.item = item;
        this.quantity = quantity;
        this.total = item.price * quantity;
    }
}

// Processing Class (YOUR PART)
class ProcessingModule {
    ArrayList<Order> orders = new ArrayList<>();

    public Order processOrder(MenuItem item, int quantity) {
        Order order = new Order(item, quantity);
        orders.add(order); // store temporarily (prototype)
        return order;
    }
}

// MAIN (for testing)
public class ProcessingSystem {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);

        // MENU (converted from Zoey's PHP)
        MenuItem[] menu = {
            new MenuItem("T1", "Classic Tapsilog", 120),
            new MenuItem("T2", "Sweet Tocilog", 110),
            new MenuItem("T3", "Garlic Longsilog", 100),
            new MenuItem("T4", "Crispy Bangsilog", 130),
            new MenuItem("T5", "Fried Chicksilog", 115)
        };

        // DISPLAY MENU
        System.out.println("=== SILOG MENU ===");
        for (MenuItem item : menu) {
            System.out.println(item.code + " - " + item.name + " (₱" + item.price + ")");
        }

        // INPUT 
        System.out.print("Enter item code: ");
        String code = sc.nextLine();

        System.out.print("Enter quantity: ");
        int qty = sc.nextInt();

        // FIND ITEM
        MenuItem selected = null;
        for (MenuItem item : menu) {
            if (item.code.equalsIgnoreCase(code)) {
                selected = item;
                break;
            }
        }

        // SIMPLE VALIDATION (temporary - Zach can replace)
        if (selected == null || qty <= 0) {
            System.out.println("Invalid order.");
            return;
        }

        // PROCESSING
        ProcessingModule processor = new ProcessingModule();
        Order order = processor.processOrder(selected, qty);

        // TEMP OUTPUT (Dulay will replace)
        System.out.println("\n=== ORDER SUMMARY ===");
        System.out.println("Item: " + order.item.name);
        System.out.println("Quantity: " + order.quantity);
        System.out.println("Total: ₱" + order.total);
    }
}