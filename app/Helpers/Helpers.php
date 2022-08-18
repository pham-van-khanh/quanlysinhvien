<?php

namespace App\Helpers;

class Helpers
{

    public static function faculty($faculties, $parent_id = 0, $char = '')
    {
        $html = '';

        foreach ($faculties as $key => $faculty) {
            if ($faculty->faculty == $parent_id) {
                $html .= '
                    <tr id="id'. $faculty->id . '">
                        <td> '. $key+1  . '    </td>
                        <td>' . $char . $faculty->name . '</td>

                        <td>' . $faculty->updated_at . '</td>
                          <td>
                           <a onclick="update('.$faculty->id.')" data-bs-toggle="modal" data-bs-target="#edit-bookmark"
                            id="editFaculty" data-id="'.$faculty->id.'">
                           <button class="btn btn-danger" style="font-size:9px"href="javascript:;"
                                        class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                        data-original-title="Edit user">
                                    Edit
                                </button>
                                </a>
                                </td>

                    </tr>
                ';

                unset($faculties[$key]);

                $html .= self::faculty($faculties, $faculty->id, $char . '|--');
            }
        }

        return $html;
    }


    public  static  function  subjects($subjects, $char = ''){
            $html = '';
            foreach ($subjects as $key => $subject) {
                    $html .='
                    <tr>
                                   <td>'.   $key+1    .'</td>
                                    <td>'. $char + ''. $subject->name .  '</td>
                                    <td>'. $char +''.$subject->created_at . '</td>
                    </tr>
                    ';
            }
            return $html;
    }
}
