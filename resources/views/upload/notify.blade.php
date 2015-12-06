	<p>A new file has been uploaded by {{ $user }}.</p>
	<p>Filename: {{ $filename }}</p>
	<p>File size: {{ $filesize }}</p>
  <p>Link: {{ Route('download', ['token' => $token]) }}</p>
