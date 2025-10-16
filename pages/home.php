<?php
// fetch featured products
$pdo = db_connect();
$stmt = $pdo->query("SELECT id, name, price, image, short_desc FROM products ORDER BY id DESC LIMIT 6");
$featured = $stmt->fetchAll();
?>
<section class="hero glass">
    <div class="hero-left">
        <h1 class="cosmic-title">TechLink Bangladesh</h1>
        <p class="hero-text">Explore the Future of Technology</p>
        <p class="sub-text">Your Trusted Tech Partner in Bangladesh — providing cutting-edge gadgets, computer parts, and advanced IT services.</p>
        <div class="cta-group">
            <a href="<?php echo BASE_URL; ?>/?page=shop" class="btn primary">Explore Products</a>
            <a href="<?php echo BASE_URL; ?>/?page=services" class="btn secondary">Our Services</a>
        </div>
    </div>
    <div class="hero-right">
        <div class="hero-image floating">
            <div class="planet-circle"></div>
            <div class="orbit-line"></div>
            <div class="satellite"></div>
        </div>
    </div>
</section>

<section class="featured">
    <h2 class="section-title">Featured Technology</h2>
    <div class="product-grid">
        <?php foreach ($featured as $p): ?>
            <div class="product-card glass">
                <div class="product-image-wrapper">
                    <img src="<?php echo BASE_URL; ?>/assets/images/<?php echo $p['image'] ?: 'placeholder.png'; ?>" 
                         alt="<?php echo htmlspecialchars($p['name']); ?>">
                    <div class="hover-effect"></div>
                </div>
                <h3><?php echo htmlspecialchars($p['name']); ?></h3>
                <p class="product-desc"><?php echo htmlspecialchars($p['short_desc']); ?></p>
                <p class="price"><?php echo CURRENCY . ' ' . number_format($p['price'], 2); ?></p>
                <div class="card-actions">
                    <a href="<?php echo BASE_URL; ?>/?page=product&id=<?php echo $p['id']; ?>" class="btn primary">View Details</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="services-highlights">
    <h2 class="section-title">Advanced Solutions</h2>
    <div class="service-grid">
        <div class="service-card glass">
            <div class="service-icon network-icon"></div>
            <h3>Network Engineering</h3>
            <p>Enterprise-grade networking solutions with advanced security protocols.</p>
            <div class="service-hover">
                <ul>
                    <li>Network Architecture</li>
                    <li>Security Implementation</li>
                    <li>Performance Optimization</li>
                </ul>
            </div>
        </div>
        <div class="service-card glass">
            <div class="service-icon security-icon"></div>
            <h3>Surveillance Systems</h3>
            <p>Next-gen CCTV and monitoring solutions with AI capabilities.</p>
            <div class="service-hover">
                <ul>
                    <li>AI-Powered Detection</li>
                    <li>Remote Monitoring</li>
                    <li>Cloud Integration</li>
                </ul>
            </div>
        </div>
        <div class="service-card glass">
            <div class="service-icon support-icon"></div>
            <h3>Technical Support</h3>
            <p>Expert hardware and software solutions for optimal performance.</p>
            <div class="service-hover">
                <ul>
                    <li>24/7 Support</li>
                    <li>Remote Assistance</li>
                    <li>Preventive Maintenance</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="tech-partners glass">
    <h2 class="section-title">Trusted Brands</h2>
    <div class="partners-grid">
        <div class="partner-logo floating">AMD</div>
        <div class="partner-logo floating">Intel</div>
        <div class="partner-logo floating">NVIDIA</div>
        <div class="partner-logo floating">ASUS</div>
        <div class="partner-logo floating">MSI</div>
    </div>
</section>