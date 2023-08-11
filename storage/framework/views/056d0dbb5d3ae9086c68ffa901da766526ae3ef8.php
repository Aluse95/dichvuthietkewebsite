
<?php if($paginator->hasPages()): ?>
    <nav aria-label="Page navigation">
        <ul class="pagination m-0">
            
            <?php if($paginator->onFirstPage()): ?>
                <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
                    <a class="page-link d-flex align-items-center">
                        <span aria-hidden="true">
                            <img src="<?php echo e(asset('themes/frontend/website-service/images/icon-arr-pre.svg')); ?>" alt="icon pre">
                        </span>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item ">
                    <a class="page-link d-flex align-items-center" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev"
                       aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
                        <span aria-hidden="true">
                            <img src="<?php echo e(asset('themes/frontend/website-service/images/icon-arr-pre.svg')); ?>" alt="icon pre">
                        </span>
                    </a>
                </li>
            <?php endif; ?>

            
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <?php if(is_string($element)): ?>
                    <li class="page-item"><a class="page-link"><?php echo e($element); ?></a></li>
                <?php endif; ?>

                
                <?php if(is_array($element)): ?>
                    <?php
                        $displayDots = true; // Biến để kiểm tra xem đã hiển thị dấu "..." chưa
                    ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page <= 7 || $page >= ($paginator->lastPage() - 2) || abs($page - $paginator->currentPage()) <= 1): ?>
                            <?php if($page == $paginator->currentPage()): ?>
                                <li class="page-item active"><a class="page-link"><?php echo e($page); ?></a></li>
                            <?php else: ?>
                                <li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                            <?php endif; ?>
                        <?php elseif($displayDots && (($page == 8 && $paginator->lastPage() > 10) || $page == $paginator->lastPage() - 3)): ?>
                            <li class="page-item disabled dots"><a class="page-link">...</a></li>
                            <?php $displayDots = false; ?> 
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php if($paginator->hasMorePages()): ?>
                <li class="page-item ">
                    <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"
                       aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
                        <span aria-hidden="true">
                            <img src="<?php echo e(asset('themes/frontend/website-service/images/icon-arr-next.svg')); ?>" alt="icon next">
                        </span>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
                    <a class="page-link">
                        <span aria-hidden="true">
                            <img src="<?php echo e(asset('themes/frontend/website-service/images/icon-arr-next.svg')); ?>" alt="icon next">
                        </span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>
<?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/pagination/default.blade.php ENDPATH**/ ?>