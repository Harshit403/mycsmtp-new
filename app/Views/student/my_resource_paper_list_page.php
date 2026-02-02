<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    Paper List
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    /* Notice Strip Styles */
    .notice-strip {
        background: linear-gradient(135deg, #e63e58 0%, #d32f4e 100%);
        color: white;
        padding: 8px 15px;
        margin: 15px auto 25px;
        border-radius: 6px;
        box-shadow: 0 3px 10px rgba(230, 62, 88, 0.2);
        border-left: 4px solid #ffd700;
        position: relative;
        overflow: hidden;
    }

    .notice-strip::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    }

    .notice-content {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        font-weight: 500;
    }

    .notice-icon {
        font-size: 14px;
        animation: pulse 1.5s infinite;
    }

    .notice-text {
        flex: 1;
        overflow: hidden;
        white-space: nowrap;
    }

    .notice-text span {
        display: inline-block;
        padding-left: 100%;
        animation: marquee 20s linear infinite;
    }

    .notice-badge {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        padding: 2px 8px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 600;
        border: 1px solid rgba(255, 255, 255, 0.3);
        white-space: nowrap;
    }

    /* Animations */
    @keyframes marquee {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-100%);
        }
    }

    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.6;
        }
    }

    /* Responsive Table */
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    /* Table Styles */
    #paper_table {
        min-width: 600px;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .notice-strip {
            margin: 10px auto 20px;
            padding: 6px 12px;
        }
        
        .notice-content {
            font-size: 12px;
            gap: 8px;
        }
        
        .notice-icon {
            font-size: 12px;
        }
        
        .notice-badge {
            font-size: 10px;
            padding: 1px 6px;
        }
        
        .notice-text span {
            animation: marquee 15s linear infinite;
        }
        
        #paper_table th,
        #paper_table td {
            padding: 8px 6px;
            font-size: 14px;
        }
        
        .btn {
            padding: 6px 10px;
            font-size: 13px;
        }
    }

    @media (max-width: 576px) {
        .notice-content {
            flex-wrap: wrap;
            justify-content: center;
            text-align: center;
        }
        
        .notice-badge {
            order: -1;
            margin-bottom: 4px;
            width: 100%;
        }
        
        .notice-icon {
            display: none;
        }
        
        .notice-text span {
            animation: marquee 12s linear infinite;
        }
        
        .container {
            padding-left: 10px;
            padding-right: 10px;
        }
    }

    @media (max-width: 400px) {
        #paper_table {
            min-width: 500px;
        }
        
        .notice-text {
            font-size: 11px;
        }
        
        .btn {
            padding: 5px 8px;
            font-size: 12px;
        }
        
        .btn i {
            margin-right: 3px;
        }
    }
</style>

<?php
// Notice text configuration
$notice_text = "You may submit your answer sheet up to one week prior to the commencement of the final examination for the respective attempt.";
?>

<section class="container mt-3 mb-5 section">
    <div class="text-center">
        <h2>Paper List</h2>
    </div>
    
    <!-- Compact Notice Strip -->
    <div class="notice-strip">
        <div class="notice-content">
            <div class="notice-icon">📅</div>
            <div class="notice-text">
                <span><?= htmlspecialchars($notice_text) ?></span>
            </div>
            <div class="notice-badge">IMPORTANT NOTICE</div>
        </div>
    </div>
    
    <div class="row my-4">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped" id="paper_table">
                    <thead>
                        <tr>
                            <th>Paper Name</th>
                            <th>Download Question paper</th>
                            <th>Download Answer paper</th>
                            <?php if ($item_type!='free'): ?>
                                <th>Upload Assignment</th>
                            <?php endif ?>
                        <tr>
                    </thead>
                    <tbody>
                        <?php
                            if(!empty($getPaperDetails)){
                                foreach($getPaperDetails as $paperRow){
                                    $paper_name = str_replace('','_',trim($paperRow['paper_name']));
                                    ?>
                                        <tr>
                                            <td><?=$paperRow['paper_name']?></td>
                                            <td>    
                                                <a href="<?=base_url().$paperRow['question_paper_upload']?>" class="btn btn-success" download="<?=$paper_name?>question_paper.pdf">
                                                    <i class="bi bi-arrow-down-circle"></i> Download
                                                </a>
                                            </td>
                                            <td> 
                                                <div id="answerBtnContainer<?=$paperRow['paper_id']?>" class="answerBtnContainerClass" style="display:<?=$item_type!='free' ? 'none' : ''?>?;">
                                                    <a href="<?=base_url().$paperRow['answer_paper_upload']?>" class="btn btn-success" download="<?=$paper_name?>answer_paper.pdf">
                                                        <i class="bi bi-arrow-down-circle"></i> Download
                                                    </a>
                                                </div>   
                                            </td>
                                            <?php if ($item_type!='free'): ?>
                                                <td>  
                                                    <div class="row" id="assignmentConatianer<?=$paperRow['paper_id']?>">
                                                        <div class="col-md-8">
                                                            <input type="file" class="form-control mr-2" id="assignmentFile<?=$paperRow['paper_id']?>" accept="application/pdf,image/*"/>
                                                        </div>
                                                        <div class="col-md-4">
                                                           <a href="javascript:void(0)" class="btn btn-info uploadAssignment" data-paper-id="<?=$paperRow['paper_id']?>">
                                                               <i class="fa fa-upload"></i> Upload
                                                           </a> 
                                                        </div>
                                                    </div>  
                                                </td>
                                            <?php endif ?>
                                        </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                    <tr>
                                        <td colspan="4">No Paper Available</td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('jsContent')?>
    <script>
        var pageType = 'paper-list';
        
        // Optional: Add JavaScript to handle the marquee on very small screens
        $(document).ready(function() {
            function adjustMarqueeSpeed() {
                var windowWidth = $(window).width();
                var marqueeSpans = $('.notice-text span');
                
                if (windowWidth < 576) {
                    // Stop animation on very small screens and show full text
                    marqueeSpans.css({
                        'animation': 'none',
                        'white-space': 'normal',
                        'padding-left': '0',
                        'transform': 'none',
                        'display': 'block'
                    });
                    $('.notice-text').css('white-space', 'normal');
                } else {
                    // Restore marquee animation on larger screens
                    marqueeSpans.css({
                        'animation': 'marquee 20s linear infinite',
                        'white-space': 'nowrap',
                        'padding-left': '100%',
                        'display': 'inline-block'
                    });
                    $('.notice-text').css('white-space', 'nowrap');
                }
            }
            
            // Adjust on load and resize
            adjustMarqueeSpeed();
            $(window).resize(adjustMarqueeSpeed);
        });
    </script>
    <script src="<?=base_url()?>assets/js/custom_js/view.js?v=1.0.2"></script>
<?= $this->endSection() ?>
