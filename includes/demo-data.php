<?php
// Phase 1: static example values only, not real users, AI scores, or database records.
$dashboardStats = ['students'=>150, 'instructors'=>12, 'essays'=>320, 'pending'=>18];
$recentSubmissions = [
 ['id'=>1024,'student'=>'Ahmed Ali','assignment'=>'Climate Change Essay','status'=>'Graded','grade'=>88],
 ['id'=>1025,'student'=>'Sara Mohamed','assignment'=>'Artificial Intelligence','status'=>'Pending','grade'=>null],
 ['id'=>1026,'student'=>'Omar Hassan','assignment'=>'Online Education','status'=>'Graded','grade'=>92]
];
$recentActivities = [
 ['action'=>'New student registered','user'=>'Ahmed Ali','time'=>'10 minutes ago'],
 ['action'=>'Essay graded successfully','user'=>'Omar Hassan','time'=>'25 minutes ago'],
 ['action'=>'Instructor account created','user'=>'Admin','time'=>'1 hour ago']
];
