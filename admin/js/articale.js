function setDeleteAction() {
if(confirm("Are you sure want to delete these Articales?")) {
document.frmUser.action = "bin_data/delete_article.php";
document.frmUser.submit();
}
}

function catDeleteAction() {
if(confirm("Are you sure want to delete these Categories?")) {
document.frmUser.action = "bin_data/delete_sub_cat.php";
document.frmUser.submit();
}
}

function DcatDeleteAction() {
if(confirm("Are you sure want to delete these Categories?")) {
document.frmUser.action = "bin_data/delete_download_cat.php";
document.frmUser.submit();
}
}

function downloadDeleteAction() {
if(confirm("Are you sure want to delete these Files?")) {
document.frmUser.action = "bin_data/delete_download_file.php";
document.frmUser.submit();
}
}