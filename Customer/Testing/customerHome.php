<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./customerHome.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="sidebar">
        <h1 class="logo">The Outer Clove</h1>
        <div class="sidebar-menus">
            <a href=""><ion-icon name="storefront-outline"></ion-icon>Home</a>
            <a href=""><ion-icon name="receipt-outline"></ion-icon>Bills</a>
            <a href=""><ion-icon name="wallet-outline"></ion-icon>Wallet</a>
            <a href=""><ion-icon name="notifications-outline"></ion-icon>Notifications</a>
            <a href=""><ion-icon name="chatbubbles-outline"></ion-icon>Contact Us</a>
            <a href=""><ion-icon name="settings-outline"></ion-icon>setting</a>
        </div>

        <div class="sidebar-logout">
            <a href=""><ion-icon name="log-out-outline"></ion-icon>Logout</a>
        </div>
    </div>

    <div class="main">
        <div class="main-navbar">
            <ion-icon class="menu-toggle" name="menu-outline"></ion-icon>
            
            <div class="search">
                <input type="text" placeholder="What you want to eat?">
                <button class="serach-btn">search</button>
            </div>

            <div class="profile">
                <a class="cart" href=""><ion-icon name="cart-outline"></ion-icon></a>
                <a class="user" href=""><ion-icon name="person-outline"></ion-icon></a>
            </div>
        </div>

        <div class="main-highlight">
            <div class="main-header">
                <h2 class="main-title">Recommendations</h2>
                    <div class="main-arrow">
                        <ion-icon class="back" name="chevron-back-circle-outline"></ion-icon>
                        <ion-icon class="next" name="chevron-forward-circle-outline"></ion-icon>
                    </div>
                </h2>
            </div>

            <div class="highlight-wrapper">
                <div class="highlight-card">
                    <img src="../CustomerImages/chad-montano-eeqbbemH9-c-unsplash.jpg" alt="" class="highlight-img">
                    <div class="highlight-desc">
                        <h4>Fresh Salad</h4>
                        <p>$42.50</p>
                    </div>
                </div>
            </div>

            <div class="highlight-wrapper">
                <div class="highlight-card">
                    <img src="../CustomerImages/chad-montano-eeqbbemH9-c-unsplash.jpg" alt="" class="highlight-img">
                    <div class="highlight-desc">
                        <h4>Cafe Latte</h4>
                        <p>$20.00</p>
                    </div>
                </div>
            </div>

            <div class="highlight-wrapper">
                <div class="highlight-card">
                    <img src="../CustomerImages/chad-montano-eeqbbemH9-c-unsplash.jpg" alt="" class="highlight-img">
                    <div class="highlight-desc">
                        <h4>Primium Steak</h4>
                        <p>$142.50</p>
                    </div>
                </div>
            </div>

            <div class="highlight-wrapper">
                <div class="highlight-card">
                    <img src="../CustomerImages/chad-montano-eeqbbemH9-c-unsplash.jpg" alt="" class="highlight-img">
                    <div class="highlight-desc">
                        <h4>Big Burger</h4>
                        <p>$25.78</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-menu">
                <div class="main-filter">
                    <div>
                        <h2 class="main-title">Menu <br>Category</h2>
                        <div class="main-arrow">
                            <ion-icon class="back" name="chevron-back-circle-outline"></ion-icon>
                            <ion-icon class="next" name="chevron-forward-circle-outline"></ion-icon>
                        </div>
                    </div>

                    <div class="filter-wrapper">
                        <div class="filter-card">
                            <div class="filter-icon">
                                <ion-icon name="restaurant-outline"></ion-icon>
                            </div>
                            <p>All Menus</p>
                        </div>

                        <div class="filter-card">
                            <div class="filter-icon">
                                <ion-icon name="fast-food-outline"></ion-icon>
                            </div>
                            <p>Burger</p>
                        </div>

                        <div class="filter-card">
                            <div class="filter-icon">
                                <ion-icon name="pizza-outline"></ion-icon>
                            </div>
                            <p>Pizza</p>
                        </div>

                        <div class="filter-card">
                            <div class="filter-icon">
                                <ion-icon name="wine-outline"></ion-icon>
                            </div>
                            <p>Wine</p>
                        </div>

                        <div class="filter-card">
                            <div class="filter-icon">
                                <ion-icon name="ice-cream-outline"></ion-icon>
                            </div>
                            <p>Ice Creams</p>
                        </div>

                        <div class="filter-card">
                            <div class="filter-icon">
                                <ion-icon name="fish-outline"></ion-icon>
                            </div>
                            <p>Sea Foods</p>
                        </div>

                        <div class="filter-card">
                            <div class="filter-icon">
                                <ion-icon name="nutrition-outline"></ion-icon>
                            </div>
                            <p>Healthy</p>
                        </div>
                    </div>
                </div>

                <hr class="divider">

                <div class="main-detail">
                    <h2 class="main-title">Choose Order</h2>
                    <div class="detail-wrapper">
                        <div class="detail-card">
                            <img src="" alt="" class="detail-img">
                            <div class="detail-name">
                                <h4>Shrimp Soup</h4>
                                <p class="detail-sub">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga placeat, incidunt quam, error officia nostrum culpa sapiente quos quasi ipsa iste molestiae eligendi veritatis suscipit.</p>
                                <p class="price">$152.00</p>
                            </div>
                            <ion-icon class="detail-favorites" name="bookmark-outline"></ion-icon>
                        </div>
                    </div>
                </div>
        </div>

    </div>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>