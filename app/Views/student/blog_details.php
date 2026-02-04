<?= $this->extend('layout/student_layout') ?>

<?php
// Prepare SEO data dynamically from blog content
$pageTitle = !empty($blog_item->blog_heading) ? $blog_item->blog_heading : 'Blog Post';
$metaDescription = !empty($blog_item->blog_text) ? substr(strip_tags($blog_item->blog_text), 0, 160) . '...' : 'Read our latest blog post on My CS MTP';
$keywords = 'cs blog, company secretary, cs exam, icsi, study tips, ' . strtolower(str_replace(' ', ', ', $pageTitle));
$canonicalUrl = base_url() . 'blog/' . $blog_item->blog_id;
$ogImage = !empty($blog_item->blog_temp_image) ? base_url() . $blog_item->blog_temp_image : base_url() . 'images/og-blogs.jpg';
$publishDate = !empty($blog_item->created_date) ? date('c', strtotime($blog_item->created_date)) : date('c');
$modifiedDate = !empty($blog_item->updated_date) ? date('c', strtotime($blog_item->updated_date)) : $publishDate;

// Calculate reading time
$wordCount = str_word_count(strip_tags($blog_item->blog_text ?? ''));
$readingTime = ceil($wordCount / 200); // Average reading speed: 200 words per minute
if ($readingTime < 1) $readingTime = 1;

// Get related blogs (if available in the data)
$relatedBlogs = $related_blogs ?? [];
?>

<?= $this->section('title') ?><?= htmlspecialchars($pageTitle) ?> - My CS MTP<?= $this->endSection() ?>

<?= $this->section('seoSection') ?>
    <meta name="description" content="<?= htmlspecialchars($metaDescription, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="keywords" content="<?= $keywords ?>">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">
    <meta name="theme-color" content="#1ab79c">
    <meta name="author" content="My CS MTP">
    <meta name="article:published_time" content="<?= $publishDate ?>">
    <meta name="article:modified_time" content="<?= $modifiedDate ?>">
    
    <link rel="canonical" href="<?= $canonicalUrl ?>">
    
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?= $canonicalUrl ?>">
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:description" content="<?= htmlspecialchars($metaDescription, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:image" content="<?= $ogImage ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="My CS MTP Test Series">
    <meta property="og:locale" content="en_IN">
    <meta property="article:published_time" content="<?= $publishDate ?>">
    <meta property="article:modified_time" content="<?= $modifiedDate ?>">
    <meta property="article:section" content="CS Exam Preparation">
    <meta property="article:tag" content="CS Exam, Company Secretary, ICSI, Study Tips">
    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?= $canonicalUrl ?>">
    <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($metaDescription, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="twitter:image" content="<?= $ogImage ?>">
    <meta name="twitter:site" content="@mycsmtp">
    
    <!-- Article Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "<?= $canonicalUrl ?>"
        },
        "headline": "<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>",
        "image": {
            "@type": "ImageObject",
            "url": "<?= $ogImage ?>",
            "width": 1200,
            "height": 630
        },
        "datePublished": "<?= $publishDate ?>",
        "dateModified": "<?= $modifiedDate ?>",
        "author": {
            "@type": "Organization",
            "name": "My CS MTP",
            "url": "<?= base_url() ?>"
        },
        "publisher": {
            "@type": "Organization",
            "name": "My CS MTP",
            "logo": {
                "@type": "ImageObject",
                "url": "<?= base_url() ?>images/logo.png",
                "width": 600,
                "height": 60
            }
        },
        "description": "<?= htmlspecialchars($metaDescription, ENT_QUOTES, 'UTF-8') ?>",
        "articleSection": "CS Exam Preparation",
        "wordCount": <?= $wordCount ?>,
        "inLanguage": "en-IN",
        "isAccessibleForFree": true,
        "educationalLevel": "CS Exam Preparation"
    }
    </script>
    
    <!-- Breadcrumb Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "<?= base_url() ?>"
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "Blogs",
                "item": "<?= base_url() ?>blogs"
            },
            {
                "@type": "ListItem",
                "position": 3,
                "name": "<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>",
                "item": "<?= $canonicalUrl ?>"
            }
        ]
    }
    </script>
    
    <!-- Organization Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "My CS MTP",
        "url": "<?= base_url() ?>",
        "logo": "<?= base_url() ?>images/logo.png",
        "sameAs": [
            "https://www.facebook.com/mycsmtp",
            "https://twitter.com/mycsmtp",
            "https://www.linkedin.com/company/mycsmtp"
        ]
    }
    </script>
<?= $this->endSection() ?>

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
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
        --radius: 12px;
    }

    .blog-detail-page {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background-color: var(--bg);
        color: var(--dark);
        line-height: 1.7;
        min-height: 80vh;
        padding-bottom: 60px;
    }

    .blog-detail-hero {
        background: linear-gradient(135deg, #1ab79c 0%, #0f766e 100%);
        color: white;
        padding: 60px 0 80px;
        clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);
        margin-bottom: -40px;
        position: relative;
    }

    .blog-detail-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 16px;
        line-height: 1.3;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
    }

    .blog-detail-meta {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 24px;
        flex-wrap: wrap;
        font-size: 0.95rem;
        opacity: 0.95;
    }

    .blog-detail-meta-item {
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .blog-detail-image {
        width: 100%;
        max-width: 900px;
        height: 450px;
        object-fit: cover;
        border-radius: var(--radius);
        box-shadow: var(--shadow-lg);
        margin: -60px auto 40px;
        display: block;
    }

    .blog-detail-content {
        width: 98%;
        max-width: none;
        margin: 0 auto;
        background: var(--white);
        padding: 40px;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        word-wrap: break-word;
        overflow-wrap: break-word;
        hyphens: auto;
        box-sizing: border-box;
    }

    .blog-detail-content h2 {
        font-size: 1.75rem;
        font-weight: 600;
        color: var(--dark);
        margin-top: 40px;
        margin-bottom: 20px;
        line-height: 1.4;
    }

    .blog-detail-content h3 {
        font-size: 1.35rem;
        font-weight: 600;
        color: var(--dark);
        margin-top: 32px;
        margin-bottom: 16px;
        line-height: 1.4;
    }

    .blog-detail-content p {
        margin-bottom: 20px;
        color: var(--text);
        line-height: 1.8;
        font-size: 1.05rem;
    }

    .blog-detail-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 24px 0;
        box-shadow: var(--shadow);
    }

    .blog-detail-content ul,
    .blog-detail-content ol {
        margin-bottom: 24px;
        padding-left: 32px;
    }

    .blog-detail-content li {
        margin-bottom: 10px;
        line-height: 1.7;
    }

    .blog-detail-content a {
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
        border-bottom: 1px solid transparent;
        transition: all 0.3s ease;
    }

    .blog-detail-content a:hover {
        border-bottom-color: var(--primary);
    }

    .blog-detail-content blockquote {
        border-left: 4px solid var(--primary);
        padding: 20px 24px;
        margin: 24px 0;
        background: var(--primary-light);
        border-radius: 0 8px 8px 0;
        font-style: italic;
        color: var(--dark);
    }

    .blog-detail-content blockquote p {
        margin-bottom: 0;
    }

    /* Table wrapper for responsive scrolling */
    .blog-detail-content .table-wrapper {
        overflow-x: auto;
        margin: 24px 0;
        border-radius: 8px;
        box-shadow: var(--shadow);
    }

    .blog-detail-content table {
        width: 100%;
        border-collapse: collapse;
        background: var(--white);
        min-width: 500px;
    }

    .blog-detail-content th,
    .blog-detail-content td {
        padding: 12px 16px;
        text-align: left;
        border-bottom: 1px solid var(--border);
        word-wrap: break-word;
        max-width: 300px;
    }

    .blog-detail-content th {
        background: var(--primary-light);
        font-weight: 600;
        color: var(--primary-dark);
    }

    .blog-detail-content tr:last-child td {
        border-bottom: none;
    }

    /* Ensure all content elements don't overflow */
    .blog-detail-content pre,
    .blog-detail-content code {
        max-width: 100%;
        overflow-x: auto;
        white-space: pre-wrap;
        word-wrap: break-word;
    }

    .blog-detail-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--primary);
        font-weight: 500;
        text-decoration: none;
        margin-bottom: 24px;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }

    .blog-detail-back:hover {
        color: var(--primary-dark);
        gap: 12px;
    }

    .blog-detail-back svg {
        transition: transform 0.3s ease;
    }

    .blog-detail-back:hover svg {
        transform: translateX(-4px);
    }

    /* Ensure iframe and embed elements are responsive */
    .blog-detail-content iframe,
    .blog-detail-content embed,
    .blog-detail-content object,
    .blog-detail-content video {
        max-width: 100%;
        height: auto;
    }

    /* Ensure long URLs and text wrap properly */
    .blog-detail-content * {
        max-width: 100%;
    }

    /* Social Sharing */
    .blog-share {
        margin: 40px 0;
        padding-top: 32px;
        border-top: 1px solid var(--border);
    }

    .blog-share-title {
        font-size: 1rem;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 16px;
    }

    .blog-share-buttons {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .share-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .share-btn:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow);
    }

    .share-facebook {
        background: #1877f2 !important;
        color: #ffffff !important;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    }

    .share-twitter {
        background: #1da1f2 !important;
        color: #ffffff !important;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    }

    .share-linkedin {
        background: #0077b5 !important;
        color: #ffffff !important;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    }

    .share-whatsapp {
        background: #25d366 !important;
        color: #ffffff !important;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    }

    .share-copy {
        background: var(--primary) !important;
        color: #ffffff !important;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    }

    /* Ensure button text is always visible */
    .blog-share-buttons a.share-btn,
    .blog-share-buttons button.share-btn {
        color: #ffffff !important;
    }

    .blog-share-buttons a.share-btn span,
    .blog-share-buttons button.share-btn span {
        color: #ffffff !important;
    }

    /* Related Posts */
    .related-posts {
        max-width: 900px;
        margin: 60px auto 0;
        padding: 0 16px;
    }

    .related-posts-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 24px;
        text-align: center;
    }

    .related-posts-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }

    .related-post-card {
        background: var(--white);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        flex-direction: column;
    }

    .related-post-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
    }

    .related-post-image {
        width: 100%;
        height: 160px;
        object-fit: cover;
    }

    .related-post-content {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .related-post-date {
        font-size: 0.8rem;
        color: var(--text-light);
        margin-bottom: 8px;
    }

    .related-post-title {
        font-size: 1rem;
        font-weight: 600;
        color: var(--dark);
        line-height: 1.4;
        margin: 0;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .related-posts-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .blog-detail-hero {
            padding: 40px 0 60px;
        }

        .blog-detail-title {
            font-size: 1.75rem;
            padding: 0 16px;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        .blog-detail-meta {
            font-size: 0.875rem;
            gap: 16px;
            flex-direction: column;
        }

        .blog-detail-image {
            height: 250px;
            margin: -40px 16px 30px;
            width: calc(100% - 32px);
        }

        .blog-detail-content {
            padding: 20px 16px;
            margin: 0 auto;
            max-width: 95%;
        }

        .blog-detail-content h2 {
            font-size: 1.5rem;
            word-wrap: break-word;
        }

        .blog-detail-content h3 {
            font-size: 1.2rem;
            word-wrap: break-word;
        }

        .blog-detail-content p {
            font-size: 1rem;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        .blog-detail-content ul,
        .blog-detail-content ol {
            padding-left: 20px;
        }

        .blog-detail-content th,
        .blog-detail-content td {
            padding: 8px 12px;
            font-size: 0.9rem;
        }

        .share-btn span {
            display: inline;
        }

        .share-btn {
            padding: 8px 12px;
            font-size: 0.8rem;
        }

        .related-posts-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        .blog-detail-title {
            font-size: 1.5rem;
            padding: 0 12px;
        }

        .blog-detail-content {
            padding: 16px 12px;
            margin: 0 8px;
            max-width: calc(100% - 16px);
        }

        .blog-detail-content h2 {
            font-size: 1.35rem;
        }

        .blog-detail-content h3 {
            font-size: 1.1rem;
        }

        .blog-detail-content p {
            font-size: 0.95rem;
            line-height: 1.7;
        }

        .blog-detail-content ul,
        .blog-detail-content ol {
            padding-left: 16px;
        }

        .blog-detail-image {
            margin: -30px 8px 24px;
            width: calc(100% - 16px);
            height: 200px;
        }
    }
</style>

<section class="blog-detail-page" itemscope itemtype="https://schema.org/BlogPosting">
    <meta itemprop="headline" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
    <meta itemprop="datePublished" content="<?= $publishDate ?>">
    <meta itemprop="dateModified" content="<?= $modifiedDate ?>">
    <meta itemprop="author" content="My CS MTP">
    <meta itemprop="publisher" content="My CS MTP">
    <meta itemprop="image" content="<?= $ogImage ?>">
    <meta itemprop="url" content="<?= $canonicalUrl ?>">
    
    <!-- Hero Section -->
    <header class="blog-detail-hero text-center" role="banner">
        <div class="container">
            <h1 class="blog-detail-title" itemprop="headline"><?= htmlspecialchars($pageTitle) ?></h1>
            <div class="blog-detail-meta">
                <time class="blog-detail-meta-item" itemprop="datePublished" datetime="<?= $publishDate ?>">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a8 8 0 0 1 14 0z"/>
                    </svg>
                    <?= date('F j, Y', strtotime($blog_item->created_date ?? 'now')) ?>
                </time>
                <span class="blog-detail-meta-item" itemprop="author" itemscope itemtype="https://schema.org/Organization">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    </svg>
                    <span itemprop="name">My CS MTP</span>
                </span>
                <span class="blog-detail-meta-item">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16zm7-8A7 7 0 1 0 1 8a7 7 0 0 0 14 0z"/>
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                    </svg>
                    <?= $readingTime ?> min read
                </span>
            </div>
        </div>
    </header>

    <!-- Breadcrumb -->
    <nav aria-label="Breadcrumb" style="background: #f1f5f9; padding: 12px 0; margin-bottom: 20px;">
        <div class="container">
            <ol style="display: flex; flex-wrap: wrap; gap: 8px; list-style: none; padding: 0; margin: 0; font-size: 0.875rem;">
                <li><a href="<?= base_url() ?>" style="color: var(--primary); text-decoration: none;">Home</a></li>
                <li aria-hidden="true" style="color: var(--text-light);">/</li>
                <li><a href="<?= base_url() ?>blogs" style="color: var(--primary); text-decoration: none;">Blogs</a></li>
                <li aria-hidden="true" style="color: var(--text-light);">/</li>
                <li aria-current="page" style="color: var(--text);"><?= htmlspecialchars($pageTitle) ?></li>
            </ol>
        </div>
    </nav>

    <div class="container">
        <?php if (!empty($blog_item->blog_temp_image)): ?>
        <img src="<?= base_url() . $blog_item->blog_temp_image ?>" 
             alt="<?= htmlspecialchars($pageTitle) ?>" 
             class="blog-detail-image"
             itemprop="image"
             loading="eager"
             width="900"
             height="450">
        <?php endif; ?>

        <article class="blog-detail-content" itemprop="articleBody">
            <a href="<?= base_url() ?>blogs" class="blog-detail-back" aria-label="Back to all blogs">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Back to Blogs
            </a>
            
            <?php
                $blogData = $blog_item->blog_text ?? '';
                echo $blogData;
            ?>

            <!-- Social Sharing -->
            <div class="blog-share">
                <h3 class="blog-share-title">Share this article</h3>
                <div class="blog-share-buttons">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($canonicalUrl) ?>" 
                       target="_blank" rel="noopener noreferrer" class="share-btn share-facebook"
                       aria-label="Share on Facebook">
                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        <span>Facebook</span>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=<?= urlencode($canonicalUrl) ?>&text=<?= urlencode($pageTitle) ?>" 
                       target="_blank" rel="noopener noreferrer" class="share-btn share-twitter"
                       aria-label="Share on Twitter">
                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                        <span>Twitter</span>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode($canonicalUrl) ?>" 
                       target="_blank" rel="noopener noreferrer" class="share-btn share-linkedin"
                       aria-label="Share on LinkedIn">
                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                        <span>LinkedIn</span>
                    </a>
                    <a href="https://wa.me/?text=<?= urlencode($pageTitle . ' ' . $canonicalUrl) ?>" 
                       target="_blank" rel="noopener noreferrer" class="share-btn share-whatsapp"
                       aria-label="Share on WhatsApp">
                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413"/>
                        </svg>
                        <span>WhatsApp</span>
                    </a>
                    <button onclick="navigator.clipboard.writeText('<?= $canonicalUrl ?>'); alert('Link copied to clipboard!');" 
                            class="share-btn share-copy" aria-label="Copy link">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                        <span>Copy Link</span>
                    </button>
                </div>
            </div>
        </article>
    </div>

    <!-- Related Posts -->
    <?php if (!empty($relatedBlogs)): ?>
    <aside class="related-posts">
        <h2 class="related-posts-title">You Might Also Like</h2>
        <div class="related-posts-grid">
            <?php foreach ($relatedBlogs as $related): ?>
            <a href="<?= base_url() ?>blog/<?= $related->blog_id ?>" class="related-post-card">
                <img src="<?= base_url() . $related->blog_temp_image ?>" 
                     alt="<?= htmlspecialchars($related->blog_heading) ?>" 
                     class="related-post-image"
                     loading="lazy">
                <div class="related-post-content">
                    <time class="related-post-date">
                        <?= date('F j, Y', strtotime($related->created_date)) ?>
                    </time>
                    <h3 class="related-post-title"><?= htmlspecialchars($related->blog_heading) ?></h3>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </aside>
    <?php endif; ?>
</section>

<script>
// Add reading progress indicator
window.addEventListener('scroll', function() {
    const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (winScroll / height) * 100;
    
    // You can add a progress bar element if needed
    // document.getElementById("progressBar").style.width = scrolled + "%";
});
</script>
<?= $this->endSection() ?>