<?php $__env->startSection('content'); ?>
<link rel="stylesheet" type="text/css" href="css/assessment-styles.css">
<section id="services-1" class="section-padding wow fadeInUp delay-05s">
    <div class="container">
        <div id="quizzie">
            <h1>College Inquiry Assessment Test</h1>
            <p>Instructions:</p>
            <p>Your answers are irreversible so if you want to go back, please refresh the page to start over.</p>
            <p>Choose a number to answer a question. 0 being the least likely, and 4 being the most likely.</p>
            <p>Answer with utmost honesty as this will help you determine what college you will be recommended by the system.</p>
            <hr class="bottom-line">
            <div class="question-div">
              <?php $i = 1;?>
              <?php $__currentLoopData = $question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <?php if($i == 1): ?>
                    <ul class="quiz-step step <?php echo e($key->id); ?> current">
                   <?php else: ?>
                    <ul class="quiz-step step <?php echo e($key->id); ?>">
                   <?php endif; ?>
                  <li class="question">
                      <div class="question-wrap">
                              <h2><?php echo e($key->questionText); ?></h2>
                      </div>
                  </li>
                    <li class="quiz-answer low-value" data-quizIndex="0">
                        <div class="answer-wrap">
                            <p class="answer-text">0</p>
                        </div>
                    </li>
                    <li class="quiz-answer low-value" data-quizIndex="1">
                        <div class="answer-wrap">
                            <p class="answer-text">1</p>
                        </div>
                    </li>
                    <li class="quiz-answer high-value" data-quizIndex="2">
                        <div class="answer-wrap">
                            <p class="answer-text">2</p>
                        </div>
                    </li>
                    <li class="quiz-answer high-value" data-quizIndex="3">
                        <div class="answer-wrap">
                            <p class="answer-text">3</p>
                        </div>
                    </li>
                    <li class="quiz-answer high-value" data-quizIndex="4">
                        <div class="answer-wrap">
                            <p class="answer-text">4</p>
                        </div>
                    </li>
              </ul>
              <?php $i++;?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <ul id="results">
                      <li class="results-inner">
                          <p>Based on your answers, we recommend you to check out:</p>
                          <h1></h1>
                          <p class="desc"></p>
                      </li>
                  </ul>
          </div>
        </div>
    </div>
  </section> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>