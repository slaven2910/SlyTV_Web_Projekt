/* edit */

/* $(document).on("click", ".edit-button", function () {
	var commentId = $(this).data("comment-id");
	var commentText = $(this).data("comment-text");
	$("#edit-comment-text").val(commentText);
	$("#edit-comment-form").attr("data-comment-id", commentId);
});
 */
/* $("#edit-comment-form").on("submit", function (event) {
	console.log(123);
	event.preventDefault();
	var newComment = document.getElementById("edit-comment-text").value;
	document.getElementById("new-comment-input").value = newComment;
	this.submit();
});
 */

$(".edit-button").click(function () {
	var commentId = $(this).data("comment-id");
	var commentText = $(this).data("comment-text");
	$("#comment-id").val(commentId);
	$("#comment-text").val(commentText);
	$("#edit-comment-text").val(commentText);
});
