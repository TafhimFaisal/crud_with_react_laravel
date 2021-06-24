<?php
namespace App\Http\Helper;
use Illuminate\Http\Request;
use App\Models\Book;
use Session;
use Hash;
use Imagick;
use Howtomakeaturn\PDFInfo\PDFInfo;

// use NabilAnam\SimpleUpload\SimpleUpload;

trait PictureConversion {

    public function pdftoimg(Book $book)
    {
        $info = pathinfo($book->book);
        $file_name =  $info['basename'];

        $file = public_path().'\storage\books\\'.$file_name;
        $book_name = strtolower(str_replace([" ","."], "", $book->name));
        $subject_name = strtolower(str_replace([" ","."], "", $book->subject->name));

        $out_path = public_path().'\storage\books\img\\'.$subject_name.'\\'.$book_name;
        $output = $out_path.'\\'.$book_name.'-page.jpg';

        exec("mkdir $out_path");
        exec("magick convert -density 300 $file $output");
        // exec("convert -verbose -density 300 -trim $file -quality 100 -flatten -sharpen 0x1.0 $output");

        $images = glob($out_path.'\*.jpg');
        $data = [];

        foreach ($images as $key => $image) {

            $image_data = [];
            $image_data["book_id"] = $book->id;
            $image_data["screen_shot_base64"] = $this->convertImageToBase64($image);
            $image_data["screen_shot_location"] = str_replace('\\','/',str_replace( [public_path(),''],'',$image));
            $data[$key] = $image_data;

        }

        return $data;

    }

    public function getScreenShotOfPDF(Request $request)
    {
        $url = $request->base64code;
        $dir = public_path()."\storage\\";

		$image_parts = explode(";base64,", $url);
        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $dir . uniqid() . '.png';
        file_put_contents($file, $image_base64);

        return response()->json([
            'image' => $file
        ]);

    }

    public function convertImageToBase64($path)
    {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }

    function getText($base_64_croped_image)
    {

        $location = $base_64_croped_image;
        $vision = new \Vision\Vision(
            // "AIzaSyA1UVdpjo4btHBWHMWJmnoPRrPe2wgvZwk",
            "AIzaSyCr4t1T5Bn8gZsEsJxuQiweqIqtVsnD4o4",
            [
                new \Vision\Feature(\Vision\Feature::DOCUMENT_TEXT_DETECTION, 100),
            ]
        );

        $response = $vision->request(
            new \Vision\Request\Image\LocalImage($location)
        );

        $text = $response->getfullTextAnnotation() != null ? $response->getfullTextAnnotation()->gettext() : null;

        // $image_path = '/'.'storage/'.$location;

        // if(\File::exists($image_path)) {
        //     \File::delete($image_path);
        // }

        return $text;

    }
}
