<?php

namespace App\Helpers;

class Helpers
{
    public static function faculty($faculties)
    {
        $html = '';

        foreach ($faculties as $key => $faculty) {

            $html .= '

                    <tr>
                        <td>' . $key+1 . '</td>
                        <td>'  . $faculty->name . '</td>

                        <td>' . $faculty->created_at . '</td>
                        <td class="align-middle">
                        <a href="{{route(faculty.edit),'.$faculty->id.'}}">
                       <button class="btn btn-danger">Sửa</button>
                        </a>
                            </td>
                        </tr>
                ';

                unset($faculties[$key]);

            $html .= self::faculty($faculties);

        }

        return $html;
    }
}
