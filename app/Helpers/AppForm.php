<?php

namespace App\Helpers;

/**
 * 
 * Static form helper
 * 
 */
class AppForm{
    // example {!! App\Helpers\AppForm::input('text', 'email','email') !!}
    static function input($type="text", $label="label", $name="name", $required=false, $value="",$placeholder=null, $attr="", $footnote="", $class=""){
        $required=$required ? "required":"";
        $placeholder=$placeholder ? $placeholder:ucfirst($label);
        $pattern = $type == "password"?"pattern=\".{8,}\"":"";

        return "<div class=\"form-group row\">
            <label for=\"$name\" class=\"col-sm-3 col-form-label\">".ucwords($label)."</label>
            <div class=\"col-sm-9\">
                <input type=\"$type\" class=\"form-control $class\" id=\"$name\" 
                name=\"$name\" placeholder=\"".$placeholder."\" $required value=\"$value\" $pattern $attr>
            </div>
            <div class=\"invalid-feedback\">
                $footnote
            </div>
        </div>";
    }
    static function textarea($type="text", $label="label", $name="name", $required=false, $value="",$placeholder=null, $attr="", $footnote="", $class=""){
        $required=$required ? "required":"";
        $placeholder=$placeholder ? $placeholder:ucfirst($label);
        $pattern = $type == "password"?"pattern=\".{8,}\"":"";

        return "<div class=\"form-group row\">
            <label for=\"$name\" class=\"col-sm-3 col-form-label\">".ucwords($label)."</label>
            <div class=\"col-sm-9\">
                <textarea type=\"$type\" class=\"form-control $class\" id=\"$name\" rows=\"10\" cols=\"45\"
                name=\"$name\" placeholder=\"".$placeholder."\" $required $pattern $attr style=\"white-space: pre-line\">$value</textarea>
            </div>
            <div class=\"invalid-feedback\">
                $footnote
            </div>
        </div>";
    }

    static function inputNumber($type="number", $label="label", $name="name", $required=false, $value=0,$placeholder=null, $attr="", $footnote="", $class=""){
        $required=$required ? "required":"";
        $placeholder=$placeholder ? $placeholder:ucfirst($label);
        $pattern = $type == "password"?"pattern=\".{8,}\"":"";

        return "<div class=\"form-group row\">
            <label for=\"$name\" class=\"col-sm-3 col-form-label\">".ucwords($label)."</label>
            <div class=\"col-sm-9\">
                <input type=\"$type\" class=\"form-control $class\" id=\"$name\" 
                name=\"$name\" placeholder=\"".$placeholder."\" $required value=\"$value\" $pattern $attr>
            </div>
            <div class=\"invalid-feedback\">
                $footnote
            </div>
        </div>";
    }

    static function inputDisabled($type="text", $label="label", $name="name", $required=false, $value=""){
        $required=$required ? "required":"";

        return "<div class=\"form-group row\">
            <label for=\"$name\" class=\"col-sm-3 col-form-label\">".ucwords($label)."</label>
            <div class=\"col-sm-9\">
                <input type=\"$type\" class=\"form-control\" id=\"$name\" 
                name=\"$name\" placeholder=\"".ucfirst($label)."\" $required value=\"$value\" disabled>
            </div>
        </div>";
    }
    
    static function select($label="label", $name="name", $data=[],$required=false, $value="", $initoption="-"){
        $required=$required ? "required":"";
        $opts="";
        foreach($data as $d){
            $select = "";
            if($value == $d){
                $select = "selected";
            }
            $opts.="<option $select value=\"$d\">".ucwords($d)."</option>";
        }

        return "<div class=\"form-group row\">
            <label for=\"$name\" class=\"col-sm-3 col-form-label\">".ucwords($label)."</label>
            <div class=\"col-sm-9\">
                <select class=\"form-control\" name=\"$name\" id=\"$name\" $required>   
                    <option value=\"\">$initoption</option>
                    $opts
                </select>
            </div>
        </div>";
    }

    static function selectNamed($label="label", $name="name", $data=[[]],$required=false, $value=""){
        $required=$required ? "required":"";
        $opts="";
        foreach($data as $d){
            $select = "";
            if($value == $d[0]){
                $select = "selected";
            }
            $opts.="<option $select value=\"$d[0]\">".ucwords($d[1])."</option>";
        }

        return "<div class=\"form-group row\">
            <label for=\"$name\" class=\"col-sm-3 col-form-label\">$label</label>
            <div class=\"col-sm-9\">
                <select class=\"form-control\" name=\"$name\" id=\"$name\">
                <option value=\"\">-</option> 
                    $opts
                </select>
            </div>
        </div>";
    }

    static function selectModel($label="label", $name="name", $data=[], $col1, $col2,$required=false, $value=""){
        $required= $required ? "required":"";
        $opts="";
        foreach($data as $d){
            $select = "";
            if($value == $d->$col1){
                $select = "selected";
            }
            $opts.="<option $select value=\"".$d->$col1."\">".ucwords($d->$col2)."</option>";
        }

        return "<div class=\"form-group row\">
            <label for=\"$name\" class=\"col-sm-3 col-form-label\">$label</label>
            <div class=\"col-sm-9\">
                <select class=\"form-control\" name=\"$name\" id=\"$name\" $required>
                <option value=\"\">Pilih Salah Satu</option> 
                    $opts
                </select>
            </div>
        </div>";
    }

    static function selectModelno($label="label", $name="name", $data=[], $col1, $col2,$required=false, $value=""){
        $required= $required ? "required":"";
        $opts="";
        foreach($data as $d){
            $select = "";
            if($value == $d->$col1){
                $select = "selected";
            }
            $opts.="<option $select value=\"".$d->$col1."\">".ucwords($d->$col2)."</option>";
        }

        return "<div class=\"form-group row\">
            
            <div class=\"col-sm-9\">
                <select class=\"form-control\" name=\"$name\" id=\"$name\" $required>
                <option value=\"\">Pilih Salah Satu</option> 
                    $opts
                </select>
            </div>
        </div>";
    }

    
}