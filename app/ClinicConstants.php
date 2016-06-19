<?php
/**
 * Created by PhpStorm.
 * User: joya
 * Date: 31/05/16
 * Time: 01:59 م
 */
namespace app;

class ClinicConstants{
    public static $eyeType=array('right','left');
    public static $medicalHistoryType=array('surgery','disease','medicine');
    public static $reservationStatus=array('cancel','postpone','ontime');
    public static $role=array('doctor','secretary');
    public static $vision=array('6/6','6/9','6/12','6/18','6/24','6/36','6/60','5/60','4/60','3/60','2/60','1/60','H.M','PL','No_Pl');
    public static $reservationType=array('examination','firstConsultation','secondConsultation','thirdConsultation','glassesPrescription');
    public static $medicineType=array('eye_drops','eye_ointment','capsule','tablet','syurp','suspension','Anti_glucoma','Lubricant');
    public static $day=array('saturday', 'sunday','monday','tuesday','wednesday','thursday','friday'); //multiple value not done
    public static $status=array('cancelled','postponed','onTime','waiting','done'); //not done yet
    public static $examGlassType=array('withCyclo','C.L','Far','Near','UCVA','BCVA');
}
