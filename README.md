CI_FormBuilder
==============

Installation
============

1. add the CI_FormBuilder library to your APPPATH.'libraries/' folder
2. create an __autoload() function that iterates the folder where CI_FormBuilder
   is located (if one does't already exist).
3. Begin using CI_FormBuilder

General Information
===================

This repository contains a CodeIgniter Library I'm working on. This library is a
series of objects each one using a codeigniter form_helperfunction to generate a
form element. The Form.php class is the main object and stores each element
independently of the others. Upon calling Form::renderForm() the Form will be
built with all of the form elements being generated in the order they were added
to the form. The benefit to using this library over the CI form_helper functions
directly is that it allows you to work with objects rather than arrays which
makes manipulating attributes much more simple.

The FormBuilder.php object simplifies creating elements even more by allowing
you to set the most common attributes in one simple method call. If you don't
need more than an html class, name, autofocus, disabled, required or form
attribute(s) this is the best way to build your form elements. This object also
generates the parent form and FormBuilder::getForm() will return the Form()
object wich encompasses all elements that were added using
FormBuilder::addSimpleField() or FormBuilder::addFieldToForm() (addFieldToForm
allows you to add non-simple fields to the form). After calling
FormBuilder::getForm() you will then render the form by calling the
Form::renderForm() on the object that was returned.

In order to use the Form/Field/Recaptcha.php class you will need to add the
recaptcha library to APPPATH.'/third_party/' or change the require_once in
Recaptcha.php.

One gotcha that I'm still working on is the fact that this library was built with
the intention of an __autoload() function being available that iterates the
APPPATH.'libraries/' directory (where the CI_FormBuilder library would be stored)
This is obviously not native behavior for CodeIgniter and I have yet to implement
a friendly solution to using this library without an __autoload() function,
although a few designs are in the works.