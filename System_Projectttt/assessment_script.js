function logout() {
    var confirmLogout = confirm("Are you sure you want to logout?");

    if(confirmLogout) {
        alert("Logout successful");
    }else {
        alert("Logout cancelled");
    }


}