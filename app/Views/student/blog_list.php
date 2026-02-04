<?= $this->extend('layout/student_layout') ?>

<?php
// Build dynamic SEO data from first blog for defaults
$defaultBlog = !empty($blog_items[0]) ? $blog_items[0] : null;
$pageTitle = 'CS Exam Preparation Blogs | Tips, Strategies & Success Stories - My CS MTP';
$metaDescription = 'Expert articles on CS exam preparation, study strategies, ICSI pattern insights, and student success stories. Stay updated with latest tips for CSEET, CS Executive & Professional exams.';
$keywords = 'cs blogs, cs exam preparation, icsi exam tips, company secretary study guide, cs executive preparation, cs professional guide, cs success stories';

// Dynamic OG image from first blog
$ogImage = !empty($defaultBlog->blog_temp_image) 
    ? base_url() . $defaultBlog->blog_temp_image 
    : base_url() . 'images/og-blogs.jpg';
?>

<?= $this->section('title') ?><?= $pageTitle ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    :root {
        --primary: #1ab79c;
        --primary-dark: #148f77;
        --primary-light: rgba(26, 183, 156, 0.08);
        --dark: #1e293b;
        --text: #475569;
        --text-light: #64748b;
        --bg: #f8fafc;
        --white: #ffffff;
        --border: #e2e8f0;
        --shadow: 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
        --radius: 12px;
        --transition: all 0.3s ease;
    }

    .blogs-page {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background-color: var(--bg);
        color: var(--dark);
        line-height: 1.6;
        min-height: 80vh;
    }

    .blogs-hero {
        background: linear-gradient(135deg, #1ab79c 0%, #0f766e 100%);
        color: white;
        padding: 60px 0;
        clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
        margin-bottom: 48px;
        position: relative;
    }

    .blogs-hero-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 12px;
        line-height: 1.2;
    }

    .blogs-hero-subtitle {
        font-size: 1.1rem;
        opacity: 0.95;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .blog-card {
        background: var(--white);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        transition: var(--transition);
        display: flex;
        flex-direction: column;
    }

    .blog-card-link {
        text-decoration: none;
        color: inherit;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .blog-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary);
    }

    .blog-card-image {
        width: 100%;
        height: 220px;
        object-fit: cover;
        transition: var(--transition);
    }

    .blog-card:hover .blog-card-image {
        transform: scale(1.02);
    }

    .blog-card-image-wrapper {
        overflow: hidden;
        position: relative;
    }

    .blog-card-badge {
        position: absolute;
        top: 16px;
        left: 16px;
        background: var(--primary);
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .blog-card-content {
        padding: 24px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .blog-card-meta {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 12px;
        font-size: 0.85rem;
        color: var(--text-light);
    }

    .blog-card-meta-item {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .blog-card-meta-item svg,
    .blog-card-meta-item i {
        color: var(--primary);
    }

    .blog-card-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 12px;
        line-height: 1.4;
        transition: var(--transition);
    }

    .blog-card-title:hover {
        color: var(--primary);
    }

    .blog-card-excerpt {
        font-size: 0.95rem;
        color: var(--text);
        line-height: 1.7;
        margin-bottom: 20px;
        flex: 1;
    }

    .blog-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 16px;
        border-top: 1px solid var(--border);
        margin-top: auto;
    }

    .blog-card-author {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .blog-card-author-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        object-fit: cover;
        background: var(--primary-light);
    }

    .blog-card-author-name {
        font-size: 0.9rem;
        font-weight: 500;
        color: var(--dark);
    }

    .blog-card-author-role {
        font-size: 0.8rem;
        color: var(--text-light);
    }

    .blog-read-more {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--primary);
        font-weight: 500;
        font-size: 0.9rem;
        text-decoration: none;
        transition: var(--transition);
    }

    .blog-read-more:hover {
        gap: 12px;
        color: var(--primary-dark);
    }

    .blog-read-more svg {
        transition: var(--transition);
    }

    .blogs-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
        margin-bottom: 64px;
    }

    .blog-empty {
        text-align: center;
        padding: 80px 20px;
        color: var(--text-light);
    }

    .blog-empty-icon {
        font-size: 4rem;
        color: var(--border);
        margin-bottom: 20px;
    }

    .blog-empty-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 12px;
    }

    .blog-empty-text {
        font-size: 1rem;
        margin-bottom: 24px;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .blogs-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 992px) {
    }

    @media (max-width: 768px) {
        .blogs-hero {
            padding: 40px 0;
            margin-bottom: 32px;
        }

        .blogs-hero-title {
            font-size: 1.75rem;
        }

        .blogs-hero-subtitle {
            font-size: 0.95rem;
            padding: 0 16px;
        }

        .blogs-grid {
            grid-template-columns: 1fr;
            gap: 20px;
            margin-bottom: 48px;
        }

        .blog-card-content {
            padding: 20px;
        }

        .blog-card-title {
            font-size: 1.1rem;
        }

        .blog-card-excerpt {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 480px) {
        .blogs-hero {
            padding: 32px 0;
            clip-path: polygon(0 0, 100% 0, 100% 92%, 0 100%);
        }

        .blogs-hero-title {
            font-size: 1.5rem;
            margin-bottom: 8px;
        }

        .blogs-hero-subtitle {
            font-size: 0.875rem;
            padding: 0 12px;
        }

        .blog-card-image {
            height: 180px;
        }

        .blog-card-content {
            padding: 16px;
        }

        .blog-card-meta {
            font-size: 0.8rem;
            gap: 12px;
        }

        .blog-card-title {
            font-size: 1rem;
        }

        .blog-card-excerpt {
            font-size: 0.875rem;
            margin-bottom: 16px;
        }

        .blog-card-footer {
            flex-direction: column;
            gap: 12px;
            align-items: flex-start;
        }

        .blog-read-more {
            align-self: flex-start;
        }
    }
</style>

<section class="blogs-page">
    <!-- Hero Section -->
    <header class="blogs-hero text-center" role="banner">
        <div class="container">
            <h1 class="blogs-hero-title" itemprop="name">CS Exam Preparation Blogs</h1>
            <p class="blogs-hero-subtitle" itemprop="description">Expert tips, study strategies, and success stories to help you ace your CS exams</p>
        </div>
    </header>

    <!-- Breadcrumb -->
    <nav aria-label="Breadcrumb" style="background: #f1f5f9; padding: 12px 0; margin-bottom: 24px;">
        <div class="container">
            <ol style="display: flex; flex-wrap: wrap; gap: 8px; list-style: none; padding: 0; margin: 0; font-size: 0.875rem;">
                <li><a href="<?= base_url() ?>" style="color: var(--primary); text-decoration: none;">Home</a></li>
                <li aria-hidden="true" style="color: var(--text-light);">/</li>
                <li aria-current="page" style="color: var(--text);">Blogs</li>
            </ol>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <?php if (!empty($blog_items)): ?>
                    <main class="blogs-grid" role="main" aria-label="Blog articles">
                        <?php foreach ($blog_items as $index => $blogRow): ?>
                            <article class="blog-card" 
                                     role="article" 
                                     itemscope 
                                     itemtype="https://schema.org/BlogPosting"
                                     aria-labelledby="blog-<?= $blogRow->blog_id ?>">
                                
                                <!-- Hidden Schema for Search Engines -->
                                <meta itemprop="headline" content="<?= htmlspecialchars($blogRow->blog_heading, ENT_QUOTES, 'UTF-8') ?>">
                                <meta itemprop="datePublished" content="<?= date('c', strtotime($blogRow->created_date)) ?>">
                                <meta itemprop="dateModified" content="<?= date('c', strtotime($blogRow->created_date)) ?>">
                                <meta itemprop="author" content="My CS MTP">
                                <meta itemprop="publisher" content="My CS MTP">
                                <meta itemprop="image" content="<?= base_url() . $blogRow->blog_temp_image ?>">
                                <meta itemprop="url" content="<?= base_url() ?>blog/<?= $blogRow->blog_id ?>">
                                <meta itemprop="articleSection" content="CS Exam Preparation">
                                <link itemprop="mainEntityOfPage" href="<?= base_url() ?>blog/<?= $blogRow->blog_id ?>">
                                
                                <a href="<?= base_url() ?>blog/<?= $blogRow->blog_id ?>" 
                                   class="blog-card-link"
                                   id="blog-<?= $blogRow->blog_id ?>"
                                   aria-label="Read article: <?= htmlspecialchars($blogRow->blog_heading) ?>">
                                   
                                    <div class="blog-card-image-wrapper">
                                        <img src="<?= base_url() . $blogRow->blog_temp_image ?>" 
                                             alt="<?= htmlspecialchars($blogRow->blog_heading) ?>" 
                                             class="blog-card-image"
                                             loading="lazy"
                                             decoding="async"
                                             width="400"
                                             height="200"
                                             itemprop="image">
                                        <span class="blog-card-badge">CS Tips</span>
                                    </div>
                                    
                                    <div class="blog-card-content">
                                        <div class="blog-card-meta">
                                            <time class="blog-card-meta-item" itemprop="datePublished" datetime="<?= date('c', strtotime($blogRow->created_date)) ?>">
                                                <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a8 8 0 0 1 14 0z"/>
                                                </svg>
                                                <?= date('F j, Y', strtotime($blogRow->created_date)) ?>
                                            </time>
                                        </div>
                                        
                                        <h2 class="blog-card-title" itemprop="headline">
                                            <?= htmlspecialchars($blogRow->blog_heading) ?>
                                        </h2>
                                        
                                        <p class="blog-card-excerpt" itemprop="description">
                                            <?php 
                                                $blog_text = trim($blogRow->blog_text);
                                                if (!empty($blog_text)) {
                                                    if (strlen($blog_text) > 150) {
                                                        $blog_text = substr((strip_tags($blog_text)),0,150).'...';
                                                    }
                                                }
                                                echo htmlspecialchars($blog_text);
                                            ?>
                                        </p>
                                        
                                        <div class="blog-card-footer">
                                            <div class="blog-card-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
                                                <img src="<?= base_url() ?>images/default_profile_image.jpg" 
                                                     alt="My CS MTP" 
                                                     class="blog-card-author-avatar"
                                                     loading="lazy">
                                                <div>
                                                    <div class="blog-card-author-name" itemprop="name">My CS MTP</div>
                                                    <div class="blog-card-author-role">Education Expert</div>
                                                </div>
                                            </div>
                                            
                                            <span class="blog-read-more">
                                                Read More
                                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M5 12h14M12 5l7 7-7 7"/>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </article>
                        <?php endforeach; ?>
                    </main>
                <?php else: ?>
                    <div class="blog-empty" role="status">
                        <div class="blog-empty-icon">
                            <svg width="80" height="80" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                            </svg>
                        </div>
                        <h2 class="blog-empty-title">No Blogs Available</h2>
                        <p class="blog-empty-text">We're working on bringing you amazing content. Check back soon!</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
