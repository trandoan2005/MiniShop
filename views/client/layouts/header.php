<?php
$currentController = $_GET['controller'] ?? 'home';
$currentAction = $_GET['action'] ?? 'index';
?>
<nav class="navbar navbar-expand-lg navbar-shop sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php?area=client&controller=home&action=index">
            👟 ShoeShop
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#clientNav" style="border-color: rgba(255,255,255,0.3);">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="clientNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link <?= $currentController == 'home' ? 'active' : '' ?>" href="index.php?area=client&controller=home&action=index">
                        <i class="bi bi-house-door"></i> Trang chủ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($currentController == 'product' && $currentAction == 'index') ? 'active' : '' ?>" href="index.php?area=client&controller=product&action=index">
                        <i class="bi bi-grid"></i> Sản phẩm
                    </a>
                </li>
                <!-- Dropdown Danh mục -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= ($currentController == 'product' && $currentAction == 'category') ? 'active' : '' ?>" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-tags"></i> Danh mục
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (!empty($categories)): ?>
                            <?php foreach ($categories as $cat): ?>
                                <?php if ($cat->status): ?>
                                <li>
                                    <a class="dropdown-item" href="index.php?area=client&controller=product&action=category&id=<?= $cat->id ?>">
                                        <?= htmlspecialchars($cat->name) ?>
                                    </a>
                                </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </li>
                <!-- Dropdown Thương hiệu -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= ($currentController == 'product' && $currentAction == 'brand') ? 'active' : '' ?>" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-award"></i> Thương hiệu
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (!empty($brands)): ?>
                            <?php foreach ($brands as $br): ?>
                                <?php if ($br->status): ?>
                                <li>
                                    <a class="dropdown-item" href="index.php?area=client&controller=product&action=brand&id=<?= $br->id ?>">
                                        <?= htmlspecialchars($br->name) ?>
                                    </a>
                                </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
            <!-- Thanh tìm kiếm -->
            <form class="d-flex search-bar" method="GET">
                <input type="hidden" name="area" value="client">
                <input type="hidden" name="controller" value="product">
                <input type="hidden" name="action" value="search">
                <input type="text" name="keyword" placeholder="Tìm kiếm giày..." value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>
</nav>
