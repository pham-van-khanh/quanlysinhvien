<?php

namespace App\Helpers;

class Subject
{
    public static function subjects($subjects, $parent_id = 0, $char = '')
    {
        $html = '';

        foreach ($subjects as $key => $subject) {
            if ($subject->faculty == $parent_id) {
                $html .= '
                    <tr id="id' . $subject->id . '">
                        <td> ' . $key + 1 . '    </td>
                        <td>' . $char . $subject->name . '</td>

                        <td>' . $subject->updated_at . '</td>
                          <td>
                           <a onclick="update(' . $subject->id . ')" data-bs-toggle="modal" data-bs-target="#edit-bookmark"
                            id="editFaculty" data-id="' . $subject->id . '">
                           <button class="btn btn-danger" style="font-size:9px"href="javascript:;"
                                        class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                        data-original-title="Edit user">
                                    Edit
                                </button>
                                </a>
                                </td>

                    </tr>
                ';

                unset($subjects[$key]);

                $html .= self::subjects($subjects, $subject->id, $char . '|--');
            }
        }

        return $html;
    }
}
