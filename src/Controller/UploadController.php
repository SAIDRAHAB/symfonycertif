<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Service\FileUploader;
use App\Form\FileUploadType;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;




class UploadController extends AbstractController
{
  
   /**
   * @Route("/admin/uploadgame", name="admin_uploadgame")
   */
  public function excelCommunesAction(Request $request, FileUploader $file_uploader)
  {
    $form = $this->createForm(FileUploadType::class);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) 
    {
      $file = $form['upload_file']->getData();
      if ($file) 
      {
        $file_name = $file_uploader->upload($file);
        if (null !== $file_name) // for example
        {
          $directory = $file_uploader->getTargetDirectory();
          $full_path = $directory.'/'.$file_name;
          // Do what you want with the full path file...
          // Why not read the content or parse it !!!
        }
        else
        {
          // Oups, an error occured !!!
        }
      }
    }
    return $this->render('admin/uploadgame.html.twig', [
      'form' => $form->createView(),
    ]);
  }
}