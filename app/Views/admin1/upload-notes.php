<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	Upload Notes
<?= $this->endSection() ?>
<?= $this->section('content') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title font-weight-bold">
						<i class="fas fa-sticky-note"></i> Upload Notes
					</div>
				</div>
				<div class="card-body">
					<!-- add level process -->
					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-12">
								<label class="control-label">Add Level</label>
								</div>
								<div class="col-md-6">
									<input type="text" class="form-control" placeholder="Add level" required id="level_name">
								</div>
								<div class="col-md-6">
									<button type="button" class="btn btn-success addLevel">Add level</button>
									<div class="row levelEditSection" style="display: none;">
										<div class="col-md-6">
											<button type="button" class="btn btn-info editLevel">Edit level</button>
										</div>
										<div class="col-md-6">
											<button type="button" class="btn btn-danger discardLevel">Discard</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-12">
									<label class="control-label">Select Level</label>
								</div>
								<div class="col-md-6">
									<select class="form-control form-select" name="" placeholder="" required id="levelSelect">
									</select>
								</div>
								<div class="col-md-6 d-flex align-items-center">
									<a href="javascript:void(0)" class="levelEditPopulateBtn btn-Class"><i class="fas fa-pen text-primary"></i></a>
									<a href="javascript:void(0)" class="levelDeleteBtn btn-Class"><i class="fas fa-trash text-danger ml-3"></i></a>
								</div>
							</div>
						</div>
					</div>
					<!-- end add level process -->
					<!-- start type add process -->
					<div class="row typeSection pt-3" style="display: none;">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-12">
								<label class="control-label">Add Type</label>
								</div>
								<div class="col-md-6">
									<input type="text" class="form-control" placeholder="Add type" required id="type_name" >
								</div>
								<div class="col-md-6">
									<button type="button" class="btn btn-success addType ">Add type</button>
									<div class="row typeEditSection" style="display: none;">
										<div class="col-md-6">
											<button type="button" class="btn btn-info editType">Edit type</button>
										</div>
										<div class="col-md-6">
											<button type="button" class="btn btn-danger discardType">Discard</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-12">
									<label class="control-label">Select Type</label>
								</div>
								<div class="col-md-6">
									<select class="form-control form-select" name="" placeholder="" required id="typeSelect" >
									</select>
								</div>
								<div class="col-md-6 d-flex align-items-center">
									<a href="javascript:void(0)" class="typeEditPopulateBtn btn-Class"><i class="fas fa-pen text-primary"></i></a>
									<a href="javascript:void(0)" class="typeDeleteBtn btn-Class"><i class="fas fa-trash text-danger ml-3"></i></a>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<label class="control-label">Type More Details</label>
								</div>
								<div class="col-md-12">
									<textarea id="moreTypeDetails">

									</textarea>
								</div>
							</div>
							
							<div class="col-md-12 my-2 text-right">
								<a href="javascript:void(0)" id="updatetypeDetails" class="btn btn-info">Edit Details</a>
							</div>
						</div>
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<label>Type Schedule</label>
								</div>
								<div class="col-md-8 typeScheduleFileUpload">
									<div class="row">
										<div class="col-md-8">
											<input type="file" id="typeSchedule" class="form-control">
										</div>
										<div class="col-md-4">
											<a href="javascript:void(0)" class="btn btn-success updateScheduleBtn ml-2">Update</a>
										</div>
									</div>
								</div>
								<div class="col-md-8 typeScheduleFileDisplay" style="display: none;">
									<div class="row">
										<div class="col-md-8">
											<div class="card uploadScheduleName bg-secondary text-white text-center pt-2" style="width: 26rem;">
												<p></p>
												<a href="#" class="stretched-link" target="_blank"></a>
											</div>
										</div>
										<div class="col-md-4">
											<i class="fas fa-times text-danger btnTyepeScheduleRemove" style="cursor: pointer;"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end add type process -->
					<!-- start subject add process -->
					<div class="row subjectSection pt-3" style="display: none;">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-12">
								<label class="control-label">Add Subject</label>
								</div>
								<div class="col-md-6">
									<input type="text" class="form-control" placeholder="Add subject" required id="subject_name" >
								</div>
								<div class="col-md-6">
									<button type="button" class="btn btn-success addSubject ">Add Subject</button>
									<div class="row subjectEditSection" style="display: none;">
										<div class="col-md-6">
											<button type="button" class="btn btn-info editSubject">Edit Sub</button>
										</div>
										<div class="col-md-6">
											<button type="button" class="btn btn-danger discardSubject">Discard</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-12">
									<label class="control-label">Select Subject</label>
								</div>
								<div class="col-md-6">
									<select class="form-control form-select" name="" placeholder="" required id="subjectSelect" >
									</select>
								</div>
								<div class="col-md-6 d-flex align-items-center">
									<a href="javascript:void(0)" class="subjectEditPopulateBtn btn-Class"><i class="fas fa-pen text-primary"></i></a>
									<a href="javascript:void(0)" class="subjectDeleteBtn btn-Class"><i class="fas fa-trash text-danger ml-3"></i></a>
								</div>
							</div>
						</div>
					</div>
					<!-- end add subject process -->
					<!-- subject offer price -->
					<div class="row subjectPriceSection mt-2" style="display:none;">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-12">
									<label class="control-label">Original Price</label>
								</div>
								<div class="col-md-12">
									<input type="number" class="form-control" placeholder="Original Price" id="subject_original_price" step="0.1">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-12">
									<label class="control-label">Offer Price</label>
								</div>
								<div class="col-md-12">
									<input type="number" class="form-control" placeholder="Offer Price" id="subject_offer_price"  step="0.1">
								</div>
							</div>
						</div>
						<!-- <div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<label class="control-label">Add More Details</label>
								</div>
								<div class="col-md-12">
									<textarea id="moreSubjectDetails">

									</textarea>
								</div>
							</div>
						</div> -->
						<div class="col-md-12 my-2 text-right">
							<a href="javascript:void(0)" id="updateSubjectDetails" class="btn btn-info">Edit Details</a>
						</div>
					</div>
					<!-- subject offer price end -->
					<div class="row paperSection pt-3" style="display:none;">
						<div class="col-md-4">
							<label class="control-label">Add Paper</label>
						</div>
						<div class="col-md-4">
							<label class="control-label">Add Question</label>
						</div>
						<div class="col-md-4">
							<label class="control-label">Add Answer</label>
						</div>
						<div class="col-md-4">
							<input type="text" class="form-control" placeholder="Paper name" id="paper_name">
						</div>
						<div class="col-md-4">
							<input type="file" id="question_paper_file" class="form-control">
						</div>
						<div class="col-md-4">
							<input type="file" id="answer_paper_file" class="form-control">
						</div>
						<div class="col-md-12 text-right py-2">
							<a href="javascript:void(0)" class="btn btn-primary" id="addPaperBtn">Add Paper</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>
<?=$this->section('jsContent')?>
<script type="text/javascript">
	var pageType = 'upload-notes';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/dashboard.js?v=1.0.5"></script>
<?= $this->endSection() ?>
